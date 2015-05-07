<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Subasta;
use App\Categoria;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class PujasController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('user.pujas.index');
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
        $subasta = new Subasta();
        $subasta -> id_user_vendedor = Auth::id();
        $subasta -> nombre = $_POST['nombre'];
        $subasta -> descripcion = $_POST['desc'];
        $subasta -> id_categoria = $_POST['categoria'];
        $subasta -> metodo_pago = $_POST['metodo'];
        $subasta -> estado = $_POST['estado'];
        $subasta -> estado_subasta = true;
        $subasta -> fecha_inicio = "2015-05-22";
        $subasta -> fecha_final = "2015-06-30";
        $subasta -> precio_inicial = 1;
        $subasta -> imagen = "ruta";

        $subasta -> save();


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
        $subasta = Subasta::select('subastas.id','subastas.nombre','subastas.descripcion','subastas.fecha_final','subastas.precio_actual')
        ->where('subastas.id_user_vendedor', Auth::id());

        return Datatables::of($subasta)
            ->add_column('actions','<a href="{{{ URL::to(\'admin/subasta/\' . $id . \'/tancar\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("Cerrar Subasta") }}</a>
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
