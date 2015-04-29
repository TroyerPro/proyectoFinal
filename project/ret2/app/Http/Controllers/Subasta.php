<?php namespace App\Http\Controllers;

class Subasta extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show()
	{
		return view('subasta.subasta');
	}

}
