<?php namespace App\Http\Controllers\Subasta;

use App\Subasta;
use App\Puja;
use App\User;
use App\Http\Controllers\Controller;

class View extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id)
	{
		$subasta = Subasta::find($id);
		$pujas = Puja::select('users.name','pujas.cantidad','pujas.fecha')->where('pujas.id_subasta',$id)->join('users','pujas.id_usuario','=','users.id')->get();
		$user = User::find($subasta->id_user_vendedor);
		return view('subasta.view', compact('subasta','user','pujas'));
	}

}
