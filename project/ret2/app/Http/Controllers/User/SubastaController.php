<?php namespace App\Http\Controllers\User;

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
    public function postCreate()
    {

      $fechaIni = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaIni']);


      $subasta = new Subasta();
      $subasta -> id_user_vendedor = Auth::id();
      $subasta -> nombre = $_POST['nombre'];
      $subasta -> descripcion = $_POST['desc'];
      $subasta -> id_categoria = $_POST['categoria'];
      $subasta -> metodo_pago = $_POST['metodo'];
      $subasta -> estado = $_POST['estado'];
      $subasta -> estado_subasta = true;
      $subasta -> fecha_inicio = $fechaIni;
      $subasta -> fecha_final = $_POST['fechaFin'];
      $subasta -> precio_inicial = floatval($_POST['precioIni']);
      $subasta -> imagen = "ruta";
      $subasta -> save();

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
       ->add_column('actions','@if($estado_subasta)
       <a href="{{{ URL::to(\'user/subasta/\' . $id . \'/cerrar\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("Cerrar Subasta") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       @else
       <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> {{ trans(" Subasta Finalizada") }}</button>
       <input type="hidden" name="row" value="{{$id}}" id="row">

       @endif')

       ->remove_column('id')
       ->remove_column('estado_subasta')

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
