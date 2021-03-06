<?php namespace App\Http\Controllers\Search;

use App\Subasta;
use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Controllers\System\SystemController;
use Datatables;

class SubastaSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show', 'filtro', 'ajaxFiltro' ] ]);
	}

	public function show() //falta $id
	{

		SystemController::cerrarSubastas();
		if (isset($_REQUEST['categoria']) || isset($_REQUEST['nombre']) || isset($_REQUEST['pmax']) ||
		isset($_REQUEST['pmin']) || isset($_REQUEST['metPago']) || isset($_REQUEST['estado'])) {

			$datos=$_REQUEST;
			if ($datos['pmax']==""||$datos['pmax']<$datos['pmin']||$datos['pmax']<0) {
				$datos['pmax']=99999;
			}

			if ($datos['pmin']==""||$datos['pmin']<0||$datos['pmin']>$datos['pmax']) {
				$datos['pmin']=0;
			}

			if ($_REQUEST['categoria']=="Seleccione la categoria") {
				$datos['categoria']="";
			}
			if ($_REQUEST['metPago']=="Seleccione el metodo de pago") {
				$datos['metPago']="";
			}
			if ($_REQUEST['estado']=="Seleccione el estado del producto") {
				$datos['estado']="";
			}

			//dd($datos);
			//die();
			$subasta = Subasta::select('subastas.*')->where('subastas.id_categoria','like','%'.$datos['categoria'].'%')
																					->where('subastas.nombre','like','%'.$datos['nombre'].'%')
																					->where('subastas.precio_actual','<=',$datos['pmax'])
																					->where('subastas.precio_actual','>=',$datos['pmin'])
																					->where('subastas.metodo_pago','like','%'.$datos['metPago'].'%')
																					->where('subastas.estado','like','%'.$datos['estado'].'%')
																					->where('subastas.estado_subasta',true)
																					->get();

		}else{
			$subasta = Subasta::select('subastas.*')->where('subastas.estado_subasta',true)->get();
		}




			$categoria = Categoria::all();

			return view('search.subasta', compact('subasta','categoria'));
	}


	public function filtro($id)
	{

		$subasta = Subasta::select('subastas.*')->where('subastas.id_categoria',$id)
																				->where('subastas.estado_subasta',true)
																				->get();
		$categoria = Categoria::all();

		return view('search.subasta', compact('subasta','categoria'));

	}

}
