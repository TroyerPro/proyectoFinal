<?php namespace App\Http\Controllers\Search;

use App\Subasta;
use App\Categoria;
use App\Http\Controllers\Controller;
use Datatables;

class SubastaSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show', 'filtro', 'ajaxFiltro' ] ]);
	}

	public function show() //falta $id
	{

			$bid = Subasta::select('subastas.*')->where('subastas.estado_subasta',true)->get();


		$categoria = Categoria::all();
		//dd($news);
		return view('search.subasta', compact('bid','categoria'));
		//return view('search.subasta');
	}


	public function filtro($id)
	{

		$bid = Subasta::select('subastas.*')->where('subastas.id_categoria',$id)->get();
		$categoria = Categoria::all();

		return view('search.subasta', compact('bid','categoria'));

	}

	public function ajaxFiltro()
	{
		$datos = $_POST;
		VAR_DUMP($datos);
		die();
		$id = $datos['idCategoria'];

		$bid = Subasta::select('subastas.*')->where('subastas.id_categoria',$id);
		$categoria = Categoria::all();

		return view('search.subasta', compact('bid','categoria'));

	}

}
