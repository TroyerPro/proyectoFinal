<?php namespace App\Http\Controllers\System;

use App\Subasta;
use App\User;
use App\Chatusuarios;
use App\Empresa;
use App\Puja;
use App\Factura;
use Carbon\Carbon;
use DateTimeZone;
use App\Confpujaauto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;

class SystemController extends Controller {


  public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'checkSubasta', 'cerrarSubastas' ] ]);
	}

	public static function checkSubasta($subastaId)
	{

    $subasta = Subasta::find($subastaId);
    $fechaFin = $subasta->fecha_final;
    $fechaActual = Carbon::now(new DateTimeZone('Europe/Madrid'));

    if($fechaFin<$fechaActual) {

      $subasta->estado_subasta=false;
      $subasta->save();

      if($subasta->precio_actual > 0) {
        SystemController::crearChat($subastaId);
        SystemController::crearFactura($subastaId);
        SystemController::enviarEmailVenta($subastaId);
      }else if($subasta->precio_actual <= 0){
        SystemController::enviarEmailSubasta($subastaId);
      }
    }
  }

  public static function enviarEmailVenta($subastaId) {
    $subasta = Subasta::find($subastaId);
    $usuarioVend = User::find($subasta->id_user_vendedor);
    $pujaGanadora=Puja::find($subasta->puja_ganadora);
    $usuarioComp=User::find($pujaGanadora->id_usuario);

    $data = array('nombreSubasta' =>$subasta->nombre , 'precioSubasta'=>$subasta->precio_actual,'nombreVendedor' =>$usuarioVend->name, 'emailVendedor' => $usuarioVend->email,'emailComprador' => $usuarioComp->email, 'nombreComprador'=>$usuarioComp->name ) ;
    Mail::send('emails.vendedor',$data , function($message) use ($data){
      $message->to($data['emailVendedor'], 'The New Topic')->subject('Subasta Caducada');
    });
    Mail::send('emails.comprador',$data , function($message) use ($data){
      $message->to($data['emailComprador'], 'The New Topic')->subject('Subasta Caducada');
    });
  }

  public static function enviarEmailSubasta($subastaId) {
    $subasta = Subasta::find($subastaId);
    $usuario = User::find($subasta->id_user_vendedor);
    $data = array('nombreSubasta' =>$subasta->nombre , 'nombre' =>$usuario->name, 'email' => $usuario->email ) ;
    Mail::send('emails.subastaAca',$data , function($message) use ($data){
      $message->to($data['email'], 'The New Topic')->subject('Subasta Caducada');
    });
  }

  public static function enviarEmailUser($userId) {
    $usuario = User::find($userId);
    $data = array('nombre' =>$usuario->name, 'email' => $usuario->email ) ;
    Mail::send('emails.baja',$data , function($message) use ($data){
      $message->to($data['email'], 'The New Topic')->subject('Baja Usuario');
    });
  }

  public static function enviarEmailWelcome($userId) {
    $usuario = User::find($userId);
    $data = array('nombre' =>$usuario->name, 'email' => $usuario->email ) ;
    Mail::send('emails.welcome',$data , function($message) use ($data){
      $message->to($data['email'], 'The New Topic')->subject('Bienvenido');
    });
  }

  public static function crearFactura($subastaId)
  {
      $fechaActual = Carbon::now();
      $subasta = Subasta::find($subastaId);
      if(is_null($subasta->id_factura)){
        $precio =  $subasta->precio_actual;
        $creador = $subasta->id_user_vendedor;
        $factura = Factura::create(['fecha'=>$fechaActual , 'precio' =>$precio , 'id_usuario'=>$creador]);
        $factura->save();
        $subasta->id_factura = $factura->id;
        $subasta->save();
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
    $subastas = Subasta::select('subastas.*')
                        ->where('subastas.estado_subasta',true)->get();
    for ($i=0; $i < count($subastas) ; $i++) {
      SystemController::checkSubasta($subastas[$i]->id);
    }
	}


  public static function actividadUsuario()
  {
    $usuarios = User::all();
    for ($i=0; $i < count($usuarios) ; $i++) {
      SystemController::checkUsuario($usuarios[$i]->id);
    }
  }

  public static function checkUsuario($usuarioId)
	{
    $subasta = Subasta::where("subastas.id_user_vendedor",$usuarioId)->orderBy('subastas.updated_at', 'DESC')->get();
    $pujas = Puja::where("pujas.id_usuario",$usuarioId)->orderBy('pujas.created_at', 'DESC')->get();
    $usuario = User::find($usuarioId);
    $inactivoPuj = false;
    $inactivoSub = false;
    $inactivo = false;
    $empresa = Empresa::all();
    $fechaActual = Carbon::now();

    //Comprovamos la última subasta modificada del usuario
    if((count($subasta)>0)){
      $fechaFinSub = $subasta[0]->created_at;
      $diferenciaSub = $fechaFinSub->diff($fechaActual);
      if($diferenciaSub->days > $empresa[0]->tiempo_inactividad) {
        $inactivoSub = true;
      }
    }
    //Comprovamos la última puja del usuario
    if((count($pujas)>0)){
      $fechaFinPuj = $pujas[0]->created_at;
      $diferenciaPuj = $fechaFinPuj->diff($fechaActual);
      if($diferenciaPuj->days > $empresa[0]->tiempo_inactividad) {
        $inactivoPuj = true;
      }
    }

    //Comprovamo si un usuario que no tiene ni pujas ni subastas , desde cuando esta registrado.
    if ((count($pujas) == 0) && (count($subasta)== 0) ) {
      $fechaUsuario = $usuario->created_at;
      $diferencia = $fechaUsuario->diff($fechaActual);
      if($diferencia->days > $empresa[0]->tiempo_inactividad) {
        $inactivo = true;
      }
    }

    // Si se ha cumplido algún caso invalidamos el usuario
    if(($inactivoSub && $inactivoPuj) || $inactivo){
      $usuario->usable = false;
      $usuario->save();
      SystemController::enviarEmailUser($usuario->id);
    }

	}

/*
Comprueba si una subasta tiene pujas automaticas al realizar una puja
si la tiene comprueba si la puja que se acaba de realizar supera al máximo de
la puja automatica de la subasta, si no la supera la pujaAutomatica pondrá el valor
de la puja nueva + el incremento de la automatica
*/
  public static function triggerPujasAuto($subastaId,$cantidad)
	{
    $subasta = Subasta::find($subastaId);

    $pujasAutos = Puja::select('pujas.id','pujas.id_subasta','pujas.cantidad','pujas.puja_auto','pujas.fecha')
    ->where('pujas.id_subasta',$subastaId)
    ->where('puja_auto', true)->paginate();

    if(count($pujasAutos)>0) {
      foreach ($pujasAutos as $pujas2) {
        $confPuja = Confpujaauto::select('confpujaautos.id','confpujaautos.max_puja','confpujaautos.incrementar','confpujaautos.id_usuario','confpujaautos.id_puja')
        ->where('confpujaautos.id_puja',$pujas2->id)
        ->get()
        ->first();
         if($cantidad<$confPuja->max_puja) {

           $pujaMenor = new Puja();
           $pujaMenor -> cantidad = $cantidad;
           $pujaMenor -> fecha = Carbon::now('Europe/Madrid');
           $pujaMenor -> id_subasta = $subastaId;
           $pujaMenor -> id_usuario = Auth::id();
           $pujaMenor -> save();


           $puja = new Puja();
           if (($cantidad+$confPuja->incrementar)>$confPuja->max_puja) {
             $puja -> cantidad = $confPuja->max_puja;
           }else{
             $puja -> cantidad = $cantidad+$confPuja->incrementar;
           }
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

           if (($cantidad+$confPuja->incrementar)>$confPuja->max_puja) {
             $subasta -> precio_actual = $confPuja->max_puja;
           }else{
             $subasta -> precio_actual = $cantidad+$confPuja->incrementar;
           }
           $subasta -> puja_ganadora = $puja->id;
           $subasta->save();


           return true;
         }else{
           $pujaMenor = new Puja();
           $pujaMenor -> cantidad = $confPuja->max_puja;
           $pujaMenor -> fecha = Carbon::now('Europe/Madrid');
           $pujaMenor -> id_subasta = $subastaId;
           $pujaMenor -> id_usuario = $confPuja->id_usuario;
           $pujaMenor -> save();

           $puja = new Puja();
           $puja -> cantidad = $cantidad;
           $puja -> fecha = Carbon::now('Europe/Madrid');
           $puja -> id_subasta = $subastaId;
           $puja -> id_usuario = Auth::id();
           $puja -> save();

           $pujas2->puja_auto=false;
           $pujas2->save();
           $confPuja->delete();

           $subasta -> precio_actual = $cantidad;
           $subasta -> puja_ganadora = $puja->id;
           $subasta->save();

           return true;
         }
      }
    }else if ($cantidad>$subasta->precio_actual) {
      $puja = new Puja();
      $puja -> cantidad = $cantidad;
      $puja -> fecha = Carbon::now('Europe/Madrid');
      $puja -> id_subasta = $subastaId;
      $puja -> id_usuario = Auth::id();
      $puja -> save();
      $subasta -> precio_actual = $cantidad;
      $subasta -> puja_ganadora = $puja->id;
      $subasta->save();
      return true;
    }else {
      return false;
    }
    return false;
	}

  public static function triggerAutoVsAuto($subastaId,$autoNewId)
	{
    $subasta = Subasta::find($subastaId);
    $autoNew=Confpujaauto::find($autoNewId);

    $pujasAutos = Puja::select('pujas.*')
    ->where('pujas.id_subasta',$subasta->id)
    ->where('puja_auto', true)
    ->get()
    ->first();

    if($pujasAutos) {
      $autoOld=Confpujaauto::select('confpujaautos.*')
                            ->where('confpujaautos.id_puja',$pujasAutos->id)
                            ->get()
                            ->first();
      if($autoOld->max_puja<$autoNew->max_puja) {
          $pujamenor = new Puja();
          $pujamenor -> cantidad = $autoOld->max_puja;
          $pujamenor -> fecha = Carbon::now('Europe/Madrid');
          $pujamenor -> id_subasta = $subastaId;
          $pujamenor -> id_usuario = $pujasAutos->id_usuario;
          $pujamenor -> save();

           $puja = new Puja();
           $puja -> cantidad = $autoOld->max_puja+$autoNew->incrementar;
           $puja -> fecha = Carbon::now('Europe/Madrid');
           $puja -> id_subasta = $subastaId;
           $puja -> id_usuario = Auth::id();
           $puja -> puja_auto = true;
           $puja -> save();

           $autoNew->id_puja=$puja->id;
           $autoNew->save();
           $autoOld->delete();

           $pujasAutos->puja_auto = false;
           $pujasAutos->save();

           $subasta -> precio_actual = $autoOld->max_puja+$autoNew->incrementar;
           $subasta -> puja_ganadora = $puja->id;
           $subasta->save();

           return true;
         }else{
           $pujamenor = new Puja();
           $pujamenor -> cantidad = $autoNew->max_puja;
           $pujamenor -> fecha = Carbon::now('Europe/Madrid');
           $pujamenor -> id_subasta = $subastaId;
           $pujamenor -> id_usuario = Auth::id();
           $pujamenor -> save();

           $puja = new Puja();
           $puja -> cantidad = $autoNew->max_puja+$autoOld->incrementar;
           $puja -> fecha = Carbon::now('Europe/Madrid');
           $puja -> id_subasta = $subastaId;
           $puja -> id_usuario = $pujasAutos->id_usuario;
           $puja -> puja_auto = true;
           $puja -> save();


           $pujasAutos->puja_auto = false;
           $pujasAutos->save();

           $autoOld->id_puja=$puja->id;
           $autoOld->save();
           $autoNew->delete();

           $subasta -> precio_actual = $autoNew->max_puja+$autoOld->incrementar;
           $subasta -> puja_ganadora = $puja->id;
           $subasta->save();
           return true;
         }

      }else if($subasta->precio_actual==0){
        $puja = new Puja();
        $puja -> cantidad = $subasta->precio_inicial+$autoNew->incrementar;
        $puja -> fecha = Carbon::now('Europe/Madrid');
        $puja -> id_subasta = $subastaId;
        $puja -> id_usuario = Auth::id();
        $puja -> puja_auto = true;
        $puja -> save();

        $autoNew->id_puja=$puja->id;
        $autoNew->save();

        $subasta -> precio_actual = $subasta->precio_inicial+$autoNew->incrementar;
        $subasta -> puja_ganadora = $puja->id;
        $subasta->save();
        return true;
      }else{
        $puja = new Puja();
        $puja -> cantidad = $subasta->precio_actual+$autoNew->incrementar;
        $puja -> fecha = Carbon::now('Europe/Madrid');
        $puja -> id_subasta = $subastaId;
        $puja -> id_usuario = Auth::id();
        $puja -> puja_auto = true;
        $puja -> save();

        $autoNew->id_puja=$puja->id;
        $autoNew->save();

        $subasta -> precio_actual = $subasta->precio_actual+$autoNew->incrementar;
        $subasta -> puja_ganadora = $puja->id;
        $subasta->save();
        return true;
      }
      return false;
    }




}
