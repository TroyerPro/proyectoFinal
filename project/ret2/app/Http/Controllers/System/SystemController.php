<?php namespace App\Http\Controllers\System;

use App\Subasta;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class SystemController extends Controller {


  public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'checkSubasta' ] ]);
	}

	public static function checkSubasta($id)
	{
    $subasta = Subasta::find($id);
    $fechaFin = $subasta->fecha_final;
    $fechaActual = Carbon::now();

    if($fechaFin<$fechaActual) {
      $subasta->estado_subasta=false;
      $subasta->save();
    }

	}

}
