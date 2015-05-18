<?php namespace App\Http\Controllers\System;

use App\Subasta;
use App\User;
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
      /*
      $chat = Subasta::select('Chatusuarios.*')->where('Chatusuarios.estado_subasta',true)->get();
      if(!$chat) {
        crearChat($subastaId);
      }
      */
    }
	}

  public static function crearChat($subastaId)
  {



  }

}
