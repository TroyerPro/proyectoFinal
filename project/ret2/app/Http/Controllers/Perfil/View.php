<?php namespace App\Http\Controllers\Perfil;

use App\User;
use App\Http\Controllers\Controller;

class View extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id) //falta $id
	{
		$user = User::find($id);
		return view('perfil.view', compact('user'));
	}
}
