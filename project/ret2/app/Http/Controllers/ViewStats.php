<?php namespace App\Http\Controllers;
use App\User;

class ViewStats extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function statsUser() //falta $id
	{
		return view('admin.statistics.users');
	}

	public function statsCategorias() //falta $id
	{
		$busqueda = "";
		if(isset($_REQUEST['filtro'])) {
			$filtro = isset($_REQUEST['filtro']);
			switch ($filtro) {
				case '0':
					break;
				case '1':
					$busqueda = 1;
					break;
				case '2':
					$busqueda = 2;
					break;
				case '3':
					$busqueda = 3;
					break;
				case '4':
					$busqueda = 4;
					break;
				case '5':
					$busqueda = 5;
					break;
				default:

					break;
			}
		}
		return view('admin.statistics.categorias', compact('busqueda'));
	}

}
