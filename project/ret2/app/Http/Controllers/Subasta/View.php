<?php namespace App\Http\Controllers\Subasta;
use App\Subasta;
use App\Http\Controllers\System\SystemController;
use App\Puja;
use App\User;
use QrCode;
use App\Http\Controllers\Controller;

class View extends Controller {


	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id)
	{

		$subasta = Subasta::find($id);
		SystemController::checkSubasta($subasta->id);
		$pujas = Puja::select('users.name','pujas.cantidad','pujas.fecha','pujas.id_usuario')

		->where('pujas.id_subasta',$id)->join('users','pujas.id_usuario','=','users.id')
		->orderBy('pujas.cantidad', 'DESC')
		->get();
		$user = User::find($subasta->id_user_vendedor);

		return view('subasta.view', compact('subasta','user','pujas','pujas8'));
	}

}
