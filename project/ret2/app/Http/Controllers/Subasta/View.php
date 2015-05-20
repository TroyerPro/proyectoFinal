<?php namespace App\Http\Controllers\Subasta;
use Carbon\Carbon;
use App\Subasta;
use App\Http\Controllers\System\SystemController;
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
		SystemController::checkSubasta($subasta->id);
		$pujas = Puja::select('users.name','pujas.cantidad','pujas.fecha')->where('pujas.id_subasta',$id)->join('users','pujas.id_usuario','=','users.id')->get();
		$user = User::find($subasta->id_user_vendedor);
		$fechaFinal = $subasta->fecha_final;
		$subasta->fecha_inicio = Carbon::createFromTimestamp(strtotime($fechaFinal));
		$subasta->fecha_inicio= $subasta->fecha_inicio -> format('d/m/Y H:m');

		//$instance = Carbon::createFromFormat('Y-m-d H:m:s', $fechaFinal, 'Europe/Madrid');
		$fechaFinals = Carbon::createFromTimestamp(strtotime($fechaFinal));
		$fechaFinal=$fechaFinals->format('m/d/Y H:m');
		$fechaFinalMolona=$fechaFinals->format('d/m/Y H:m');
		return view('subasta.view', compact('subasta','fechaFinalMolona','fechaFinal','user','pujas'));
	}

}
