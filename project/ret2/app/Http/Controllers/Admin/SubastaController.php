<?php namespace App\Http\Controllers\User;

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
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $subasta = Subasta::select('subastas.id','subastas.nombre','subastas.descripcion','subastas.fecha_final','subastas.precio_actual');

        return Datatables::of($subasta)
            ->add_column('actions','<a href="{{{ URL::to(\'admin/subasta/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
                Article::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }
}
