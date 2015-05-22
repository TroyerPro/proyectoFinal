<?php namespace App\Http\Controllers\Perfil;

use App\User;
use App\Subasta;
use App\Http\Controllers\Controller;

class View extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id) //falta $id
	{
		$user = User::find($id);
		$subastas = Subasta::select('subastas.*')
		->where('subastas.id_user_vendedor',$id)
		->take(3)
		->get();

		return view('perfil.view', compact('user','subastas'));
	}
}
