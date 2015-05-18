<?php namespace App\Http\Controllers\System;

use App\Subasta;
use App\User;
use App\Chatusuarios;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class SystemController extends Controller {


  public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'checkSubasta' ] ]);
	}

	public static function checkSubasta($subastaId)
	{
    $subasta = Subasta::find($subastaId);
    $fechaFin = $subasta->fecha_final;
    $fechaActual = Carbon::now();

    if($fechaFin<$fechaActual) {
      $subasta->estado_subasta=false;
      $subasta->save();
      SystemController::crearChat($subastaId);
    }

	}

  public static function crearChat($subastaId)
  {
    $chat = Chatusuarios::select('Chatusuarios.*')->where('Chatusuarios.id_subasta',$subastaId)->count();

    if($chat<1) {
      $subasta = Subasta::find($subastaId);
      $comprador = $subasta->getpujaGanadora()->id_usuario;
      $vendedor = $subasta->id_user_vendedor;
      $chat = Chatusuarios::create(['id_user1' => $vendedor,'id_user2' => $comprador,'id_subasta' => $subastaId]);
      $chat->save();
    }
  }



}
