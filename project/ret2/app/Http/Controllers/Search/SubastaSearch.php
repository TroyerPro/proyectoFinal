<?php namespace App\Http\Controllers\Search;

use App\Subasta;
use App\Categoria;
use App\Http\Controllers\Controller;
use Datatables;

class SubastaSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{

		$bid = Subasta::all();
		$categoria = Categoria::all();
		//dd($news);
		return view('search.subasta', compact('bid','categoria'));
		//return view('search.subasta');
	}


	public function categoria($id)
	{

		$categoria = Categoria::all();

		$bid = ret::where('id_categoria', $id);

		return view('search.subasta', compact('bid','categoria'));

	}

}
