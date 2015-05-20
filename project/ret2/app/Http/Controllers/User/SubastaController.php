<?php namespace App\Http\Controllers\User;

use App\Http\Requests\User\Imagen2Request;
use App\Http\Controllers\UserController;
use App\Subasta;
use App\Empresa;
use App\Categoria;
use App\Chatusuarios;
use Carbon;
use DateTimeZone;
use DateTime;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Http\Requests\Subasta\SubastaRequest;


class SubastaController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('user.subasta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {

        $fechaHoy=Carbon\Carbon::now(new DateTimeZone('Europe/Madrid'));
        $nombre = "";
        $estado = "";
        $descripcion = "";
		    $categoria = Categoria::all();
		    $precio_inicial = "";
        $imagen = "";
        $metodo = "";
        $Empresa = Empresa::find(1);
        $diasgratis = $Empresa->dias_subasta_gratis;
        // Show the page
        return view('user.subasta.create', compact('diasgratis','fechaHoy','nombre','estado','descripcion','categoria','precio_inicial','imagen','metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function postCreate(Imagen2Request $request, SubastaRequest $request2)
    {

      $fechaIni = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaIni']);
      $fechaFin = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaIni']);
      date_add($fechaFin, date_interval_create_from_date_string($_POST['duracion'].' days'));
      $subasta = new Subasta();
      $subasta -> id_user_vendedor = Auth::id();
      $subasta -> nombre = $request2->input('nombre');
      $subasta -> descripcion = $_POST['desc'];
      $subasta -> id_categoria = $_POST['categoria'];
      $subasta -> metodo_pago = $_POST['metodo'];
      $subasta -> metodo_envio = $_POST['metodoenvio'];
      $subasta -> estado = $_POST['estado'];
      $subasta -> estado_subasta = true;
      $subasta -> fecha_inicio = $fechaIni;
      $subasta -> fecha_final = $fechaFin;
      $subasta -> precio_inicial = floatval($_POST['precioIni']);

      //Cargar imagen subasta
      $picture = "";

      if($request->hasFile('image'))
      {
          $file = $request->file('image');
          $filename = $file->getClientOriginalName();
          $extension = $file -> getClientOriginalExtension();
          $picture = sha1($filename . time()) . '.' . $extension;
      }

      $subasta-> imagen = $picture;
      $subasta -> save();


      if($request->hasFile('image'))
      {
          $destinationPath = public_path() . '/img/subasta/';
          $request->file('image')->move($destinationPath, $picture);
      }

      $success = true;
      return view('user.subasta.index', compact('success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */


    public function getCerrar($id)
    {
        $subasta = Subasta::find($id);
        return view('user.subasta.cerrar', compact('subasta'));
    }

    public function getProrrogar($id)
    {
        $subasta = Subasta::find($id);
        $confProrroga = Empresa::find(1);

        $fechaFinal = Carbon\Carbon::createFromTimestamp(strtotime($subasta->fecha_final));
        $fechaProrroga = "";
        $fechaFinalMolona =  $fechaFinal->format('d/m/Y') ;
        return view('user.subasta.prorrogar', compact('subasta','fechaFinalMolona','confProrroga','fechaProrroga'));
    }


    public function postProrrogar($id)
    {
        $subasta = Subasta::find($id);

        $fecha_final_antes_prorroga = DateTime::createFromFormat('Y-m-d H:i:s', $subasta->fecha_final);

        $subasta->fecha_final_antes_prorroga =  $subasta->fecha_final;
        date_add($fecha_final_antes_prorroga, date_interval_create_from_date_string($_POST['diasPro'].' days'));
        $subasta->fecha_final = $fecha_final_antes_prorroga;
        $subasta->numero_prorrogas = $subasta->numero_prorrogas + 1 ;
        $subasta->estado_subasta = true;
        $subasta->save();

        return view('user.subasta.index', compact('subasta','fechaFinalMolona','confProrroga','fechaProrroga'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postCerrar($id)
    {
      $subasta = Subasta::find($id);
      $subasta -> estado_subasta = false;
      $subasta -> save();
    }


    public function getGanadas()
    {
        return view('user.subasta.ganadas');
    }
    public function getFinalizadas()
    {
        return view('user.subasta.finalizadas');
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
     public function data()
     {
       $subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.fecha_final','subastas.precio_actual')
       ->where('subastas.id_user_vendedor', Auth::id())
       ->where('subastas.estado_subasta',true)
       ->get();

       return Datatables::of($subasta)
       ->add_column('estado','@if($estado_subasta)
       Abierta
       @else
       Cerrada
       @endif')
       ->add_column('actions','@if($estado_subasta)
       <a href="{{{ URL::to(\'search/subasta/view/\' . $id . \'/\' ) }}}" class="btn btn-sm btn-info iframe"><span class="glyphicon glyphicon-search"></span> {{ trans("Resumen") }}</a>
       <a href="{{{ URL::to(\'user/subasta/\' . $id . \'/cerrar\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("Cerrar Subasta") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       @endif')

       ->remove_column('id')
       ->remove_column('estado_subasta')

       ->make();
     }

     public function data3()
     {
       $subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.fecha_final','subastas.precio_actual')
       ->where('subastas.id_user_vendedor', Auth::id())
       ->where('subastas.estado_subasta',false)
       ->get();

       return Datatables::of($subasta)
       ->add_column('estado','@if($estado_subasta)
       Abierta
       @else
       Cerrada
       @endif')
       ->add_column('actions','@if(!$estado_subasta)
       <a href="{{{ URL::to(\'user/subasta/\' . $id . \'/prorrogar\'  ) }}}" class="btn btn-sm btn-succes"><span class="glyphicon glyphicon-ok"></span> {{ trans("Prorrogar") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       <a href="{{{ URL::to(\'user/chat/\' . $id .\'/abrir\'  ) }}}" class="btn btn-sm btn-succes iframe"><span class="glyphicon glyphicon-user"></span> {{ trans("Contactar Ganador") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       <a href="{{{ URL::to(\'search/user/view/\' . $id .\'/abrir\'  ) }}}" class="btn btn-sm btn-succes iframe"><span class="glyphicon glyphicon-user"></span> {{ trans("Evaluar Ganador") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       @endif')

       ->remove_column('id')
       ->remove_column('estado_subasta')

       ->make();
     }

     /**
      * Show a list of all the languages posts formatted for Datatables.
      *
      * @return Datatables JSON
      */
      public function data2()
      {
        $subasta = Subasta::select('subastas.id','subastas.nombre','subastas.descripcion','subastas.fecha_final','subastas.precio_actual')
        ->where('pujas.id_usuario',Auth::id())
        ->join('pujas','subastas.puja_ganadora','=','pujas.id');

        return Datatables::of($subasta)
        ->add_column('actions','  <a href="{{{ URL::to(\'user/chat/\' . $id .\'/abrir\'  ) }}}" class="btn btn-sm btn-succes iframe"><span class="glyphicon glyphicon-user"></span> {{ trans("Contactar Comprador") }}</a>
          <input type="hidden" name="row" value="{{$id}}" id="row">')

        ->remove_column('id')

        ->make();
      }


    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                Subasta::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }


}
