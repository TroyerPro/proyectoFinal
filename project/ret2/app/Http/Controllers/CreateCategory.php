<?php namespace App\Http\Controllers;

use App\Categoria;

class CreateCategory extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('admin.createcategoria');
	}

	public function create() //falta $id
	{
		$nombre = $_POST['nomcat'];
		$descripcion = $_POST['desc'];
		$cat = Categoria::create(array('nombre' => $nombre,'descripcion' => $descripcion));
		$cat->save();
		return view('admin.createcategoria',compact('categoria'));
	}

}
