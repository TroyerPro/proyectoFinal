<?php namespace App\Http\Controllers;

class ModifyProfile extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('auth.config.modify');
	}

}
