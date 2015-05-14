<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Puja;
use App\Subasta;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Http\Requests\Puja\PujaRequest;

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
    public function getCreate($id)
    {
        $subasta = Subasta::find($id);

        // Show the page
        return view('user.pujas.create', compact('subasta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate($id, PujaRequest $request)
    {
      $subasta = Subasta::find($id);
      if($subasta->estado_subasta) {
        if($_POST['cantidad'] > $subasta->precio_actual) {
          $puja = new Puja();
          $puja -> cantidad = $request->input('cantidad');
          $puja -> fecha = Carbon::now();
          $puja -> id_subasta = $id;
          $puja -> id_usuario = Auth::user()->id;
          $puja -> puja_auto = false;

          $puja -> save();

          $subasta -> precio_actual = $puja -> cantidad;
          $subasta -> save();

          return view('user.pujas.index');
        }
      } else {
          return view('user.pujas.index');
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

      $puja = Puja::select('subastas.id','pujas.cantidad','pujas.fecha','subastas.nombre', 'subastas.precio_actual')
      ->where('pujas.id_usuario', Auth::id())
      ->join('subastas', 'subastas.id', '=', 'pujas.id_subasta');

      return Datatables::of($puja)
      ->add_column('pujastatus','@if($precio_actual == $cantidad)
       <div class="green">Vas ganando</div>
       @else
       <div class="red">Vas perdiendo</div>
       @endif')
          ->add_column('actions','<a href="{{{ URL::to(\'search/subasta/view/\'.$id ) }}}" class="btn btn-sm btn-default"><span class="glyphicon"></span> {{ trans("Ir a la subasta") }}</a>
                  ')
          ->remove_column('id')
          ->remove_column('precio_actual')
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
