<?php namespace App\Http\Controllers\User;

use App\Http\Requests\User\Imagen2Request;
use App\Http\Controllers\UserController;
use App\Subasta;
use App\Categoria;
use DateTime;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;


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
        $nombre = "";
        $estado = "";
        $descripcion = "";
		    $categoria = Categoria::all();
		    $precio_inicial = "";
        $imagen = "";
        $metodo = "";

        // Show the page
        return view('user.subasta.create', compact('nombre','estado','descripcion','categoria','precio_inicial','imagen','metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function postCreate(Imagen2Request $request)
    {
      $success = true;
      $fechaIni = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaIni']);

      $subasta = new Subasta();
      $subasta -> id_user_vendedor = Auth::id();
      $subasta -> nombre = $_POST['nombre'];
      $subasta -> descripcion = $_POST['desc'];
      $subasta -> id_categoria = $_POST['categoria'];
      $subasta -> metodo_pago = $_POST['metodo'];
      $subasta -> metodo_envio = $_POST['metodoenvio'];
      $subasta -> estado = $_POST['estado'];
      $subasta -> estado_subasta = true;
      $subasta -> fecha_inicio = $fechaIni;
      $subasta -> fecha_final = $fechaIni;
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




      return view('user.subasta.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $news = Article::find($id);
        // Show the page
        return view('admin.news.delete', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $news = Article::find($id);
        $news->delete();
    }

    public function getCerrar($id)
    {
        $subasta = Subasta::find($id);
        return view('user.subasta.cerrar', compact('subasta'));
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

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
     public function data()
     {
       $subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.descripcion','subastas.fecha_final','subastas.precio_actual')
       ->where('subastas.id_user_vendedor', Auth::id());

       return Datatables::of($subasta)
       ->add_column('estado','@if($estado_subasta)
       Abierta
       @else
       Cerrada
       @endif')
       ->add_column('actions','@if($estado_subasta)
       <a href="{{{ URL::to(\'user/subasta/\' . $id . \'/cerrar\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("Cerrar Subasta") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       @else
       <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> {{ trans(" Prorrogar") }}</button>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> {{ trans(" Contactar Ganador") }}</button>
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
        ->add_column('actions','<a href="{{{ URL::to(\'user/subasta/\' . $id . \'/cerrar\' ) }}}" class="btn btn-sm btn-info iframe"><span class="glyphicon glyphicon-info-sign"></span> {{ trans("Contactar Propietario") }}</a>
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
