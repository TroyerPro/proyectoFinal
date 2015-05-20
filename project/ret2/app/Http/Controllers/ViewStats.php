<?php namespace App\Http\Controllers;
use App\User;
use App\Categoria;

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
					$busqueda = Categoria::select('categoria.*')->groupBy('categoria.id_categoria');
					dd($busqueda);
					return compact('busqueda');
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

}
