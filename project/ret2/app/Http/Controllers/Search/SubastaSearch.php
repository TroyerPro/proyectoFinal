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
		if (isset($_REQUEST['nombre'])) {
		$datos=$_REQUEST;
		//dd($datos);
		//die();
		$bid = Subasta::select('subastas.*')->where('subastas.id_categoria',$datos['categoria'])
		->where('subastas.nombre',$datos['nombre'])
		->where('subastas.precio_actual','<',$datos['pmax'])
		->where('subastas.precio_actual','>',$datos['pmin'])
		->where('subastas.metodo_pago',$datos['metPago'])
		->where('subastas.estado',$datos['estado'])
		->where('subastas.estado_subasta',true)->get();

		}else{
				$bid = Subasta::select('subastas.*')->where('subastas.estado_subasta',true)->get();
		}
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

}
