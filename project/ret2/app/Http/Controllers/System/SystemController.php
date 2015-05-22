<?php namespace App\Http\Controllers\System;

use App\Subasta;
use App\User;
use App\Chatusuarios;
use App\Puja;
use Carbon\Carbon;
use App\Confpujaauto;
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
      if($subasta->precio_actual != 0) {
        SystemController::crearChat($subastaId);
      }
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

  public static function cerrarSubastas()
	{
    $suabastas = Subasta::all();
    for ($i=0; $i < count($suabastas) ; $i++) {
      SystemController::checkSubasta($suabastas[$i]->id);
    }
	}
/*
Comprueba si una subasta tiene pujas automaticas al realizar una puja
si la tiene comprueba si la puja que se acaba de realizar supera al máximo de
la puja automatica de la subasta, si no la supera la pujaAutomatica pondrá el valor
de la puja nueva + el incremento de la automatica
*/
  public static function triggerPujasAuto($subastaId,$pujaId)
	{
    $subasta = Subasta::find($subastaId);
    $pujaNueva = Puja::find($pujaId);
    $pujasAutos = Puja::select('pujas.id','pujas.id_subasta','pujas.cantidad','pujas.puja_auto','pujas.fecha')
    ->where('pujas.id_subasta',$subastaId)
    ->where('puja_auto', 1)->paginate();

    if($pujasAutos) {
      foreach ($pujasAutos as $pujas2) {
        $confPuja = Confpujaauto::select('confpujaautos.id','confpujaautos.max_puja','confpujaautos.incrementar','confpujaautos.id_usuario','confpujaautos.id_puja')
        ->where('Confpujaautos.id_puja',$pujas2->id)
        ->get()->first();
         if($pujaNueva->cantidad<$confPuja->max_puja) {
           $puja = new Puja();
           $puja -> cantidad = $pujaNueva->cantidad+$confPuja->incrementar;
           $puja -> fecha = Carbon::now('Europe/Madrid');
           $puja -> id_subasta = $subastaId;
           $puja -> id_usuario = $confPuja->id_usuario;
           $puja -> puja_auto = true;
           $puja -> save();


           $pujaAntigua = Puja::find($confPuja->id_puja);
           $pujaAntigua->puja_auto = false;
           $pujaAntigua->save();

           $confPuja->id_puja = $puja->id;
           $confPuja->save();

           $subasta -> precio_actual = $pujaNueva->cantidad+$confPuja->incrementar;
           $subasta -> puja_ganadora = $puja->id;
           $subasta->save();

           return false;
         }
      }
    }
    return true;
	}



}
