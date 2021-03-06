<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;
use App\Subasta;
use App\Categoria;
use DateTime;
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
    public function show()
    {
        // Show the page
        return view('admin.subasta.index');
    }
    public function getFinalizadas(){

      return view('admin.subasta.finalizadas');
    }

    public function factura($id){
      $subasta = Subasta::find($id);
      return view('admin.subasta.factura' ,compact('subasta'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $subasta = Subasta::find($id);
        $nombre = $subasta->nombre;
        $descripcion = $subasta->descripcion;

        return view('user.subasta.edit',compact('subasta','nombre','descripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(NewsRequest $request, $id)
    {
        $news = Article::find($id);
        $news -> user_id = Auth::id();
        $news -> language_id = $request->language_id;
        $news -> title = $request->title;
        $news -> article_category_id = $request->newscategory_id;
        $news -> introduction = $request->introduction;
        $news -> content = $request->content;
        $news -> source = $request->source;

        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $news -> picture = $picture;
        $news -> save();

        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/news/'.$news->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
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
                Article::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */

     //Todas las Subastas Finalizadas by Marc
     public function data()
     {
       $subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.fecha_final','subastas.precio_actual')
       ->where('subastas.estado_subasta',false)
       ->get();

       return Datatables::of($subasta)
       ->add_column('actions','@if(!$estado_subasta)
       <a href="{{{ URL::to(\'search/subasta/view/\' . $id . \'/\' ) }}}" class="btn btn-sm btn-info iframe"><span class="glyphicon glyphicon-search"></span> {{ trans("Resumen") }}</a>
         @if($precio_actual>0)
         <a href="{{{ URL::to(\'admin/factura/\' . $id .\'/\'  ) }}}" class="btn btn-sm btn-succes iframe"><span class="glyphicon glyphicon-user"></span> {{ trans("Factura") }}</a>
         <input type="hidden" name="row" value="{{$id}}" id="row">
         @endif
       @endif')

       ->remove_column('estado_subasta')

       ->make();
     }
     //Todas las Subastas Activas by Marc
     public function data2()
     {
       $subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.fecha_final','subastas.precio_actual')
       ->where('subastas.estado_subasta',true)->orderBy('subastas.id','DESC')
       ->get();

       return Datatables::of($subasta)
       ->add_column('estado','@if($estado_subasta)
       Abierta
       @else
       Cerrada
       @endif')
       ->add_column('actions','@if($estado_subasta)
       <a href="{{{ URL::to(\'search/subasta/view/\' . $id . \'/\' ) }}}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ trans("Resumen") }}</a>
       <a href="{{{ URL::to(\'user/subasta/\' . $id . \'/cerrar\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("Cerrar Subasta") }}</a>
       <input type="hidden" name="row" value="{{$id}}" id="row">
       @endif')
       ->remove_column('estado_subasta')

       ->make();
     }
}
