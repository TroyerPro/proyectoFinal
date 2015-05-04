<?php namespace App\Http\Controllers;

class ViewSubasta extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('subasta.subasta');
	}

}
