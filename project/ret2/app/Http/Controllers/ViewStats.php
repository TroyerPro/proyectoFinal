<?php namespace App\Http\Controllers;
use App\User;
use App\Subasta;
use App\Categoria;
use Illuminate\Support\Facades\DB as DB;

class ViewStats extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function statsUser() //falta $id
	{
		return view('admin.statistics.users');
	}

	public function statsCategorias()
{
		return view('admin.statistics.categorias');
}

	public function postStatsCategorias() //falta $id
	{
		if(isset($_REQUEST['filtro'])) {
			$filtro = $_REQUEST['filtro'];
			switch ($filtro) {
				case '0':
					break;
				case '1':
				$busqueda = Categoria::select('subastas.*')->count();
					return $busqueda;
					break;
				case '2':
					$busqueda = 2;
					return $busqueda;
					break;
				default:
					break;
			}
		}
	}

	public function postStatsUser() //falta $id
	{
		if(isset($_REQUEST['filtro'])) {
			$filtro = $_REQUEST['filtro'];
			switch ($filtro) {
				case '0':
					break;
				case '1':
					$busqueda = Categoria::select('subastas.*')
					->groupBy('subastas.id_categoria');
					dd(DB::getQueryLog());
					return $busqueda;
					break;
				case '2':
					$busqueda = 2;
					return $busqueda;
					break;
				case '3':
					$busqueda = 3;
					return $busqueda;
					break;
				case '4':
					$busqueda = 4;
					return $busqueda;
					break;
				case '5':
					$busqueda = 5;
					return $busqueda;
					break;
				case '6':
					$busqueda = 6;
					return $busqueda;
					break;
				default:
					break;
			}
		}
	}

}
