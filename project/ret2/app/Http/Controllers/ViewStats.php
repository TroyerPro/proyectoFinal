<?php namespace App\Http\Controllers;
use App\User;
use App\Subasta;
use App\Puja;
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
			$categorias = array();
			switch ($filtro) {
				case '0':
					break;
				case '1':
					$busqueda = Subasta::select( 'categorias.nombre',DB::raw('COUNT(subastas.id_categoria) as cate'))
					->join('categorias','categorias.id','=','subastas.id_categoria')
					->where('subastas.estado_subasta',0)
					->where('subastas.puja_ganadora','!=',0)
					->groupBy('subastas.id_categoria')->get();
					foreach ($busqueda as $busqueda ) {
						$categorias[$busqueda->nombre] = $busqueda->cate;
					}
					return $categorias;
					break;
				case '2':
				$busqueda = Subasta::select( 'categorias.nombre',DB::raw('COUNT(subastas.id_categoria) as cate'))
				->join('categorias','categorias.id','=','subastas.id_categoria')
				->groupBy('subastas.id_categoria')->get();
				foreach ($busqueda as $busqueda ) {
					$categorias[$busqueda->nombre] = $busqueda->cate;
				}
				return $categorias;
				break;
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
					$busqueda = Subasta::all();
					$meses = array();
					for ($i=1; $i <=12 ; $i++) {
						$meses[$i] = 0;
					}
					foreach ($busqueda as $busqueda) {
						if(!$busqueda->estado_subasta){
							for ($i=1; $i <= 12 ; $i++) {
								if ($i == $busqueda->updated_at->month) {
									$meses[$i] = $meses[$i] + 1 ;
								}
							}
						}
					}
					return json_encode($meses);;
					break;
				case '3':
				$busqueda = Subasta::all();
				$meses = array();
				for ($i=1; $i <=12 ; $i++) {
					$meses[$i] = 0;
				}
				foreach ($busqueda as $busqueda) {
						for ($i=1; $i <= 12 ; $i++) {
							if ($i == $busqueda->updated_at->month) {
								$meses[$i] = $meses[$i] + 1 ;
							}
					}
				}
				return json_encode($meses);;
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
				$busqueda = Puja::all();
				$meses = array();
				for ($i=1; $i <=12 ; $i++) {
					$meses[$i] = 0;
				}
				foreach ($busqueda as $busqueda) {
						for ($i=1; $i <= 12 ; $i++) {
							if ($i == $busqueda->updated_at->month) {
								$meses[$i] = $meses[$i] + 1 ;
							}
						}
				}
				return json_encode($meses);;
				break;
				default:
					break;
			}
		}
	}

}
