<?php namespace App\Http\Controllers\Perfil;

use App\User;
use App\Subasta;
use App\Evalusuarios;
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
		->where('subastas.estado_subasta', 1)
		->take(3)
		->get();
		$evaluaciones = Evalusuarios::select('evalusuarios.comentario','evalusuarios.id_user_evaluador','u1.name','evalusuarios.id_rating')
		->where('evalusuarios.id_user_evaluado',$id)
		->join('users as u1','evalusuarios.id_user_evaluador','=','u1.id')
		->take(10)
		->get();


		return view('perfil.view', compact('user','subastas','evaluaciones'));
	}
}
