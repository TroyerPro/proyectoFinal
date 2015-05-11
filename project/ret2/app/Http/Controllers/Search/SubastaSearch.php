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

		if (isset($_REQUEST['idCategoria'])) {
			$id= $_REQUEST['idCategoria'];
			$bid = Subasta::select('subastas.*')->where('id_categoria', $id);
echo $bid;
		}else{
			$bid = Subasta::all();
		}

		$categoria = Categoria::all();
		//dd($news);
		return view('search.subasta', compact('bid','categoria'));
		//return view('search.subasta');
	}


	public function filtro()
	{

		$categoria = Categoria::all();
		$id= $_REQUEST['idCategoria'];

		return view('search.subasta', compact('bid','categoria'));

	}

}
