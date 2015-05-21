<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Puja;
use App\Subasta;
use App\Categoria;
use Carbon\Carbon;
use App\Http\Controllers\System\SystemController;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Http\Requests\Puja\PujaRequest;

class PujasAutoController extends UserController {

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

        if(!$subasta->estado_subasta) {
          return redirect('home');
        }

        return view('user.pujas.createAuto', compact('subasta'));
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
          $puja -> cantidad = $subasta->precio_actual+$_POST['increment'];
          $puja -> fecha = Carbon::now('Europe/Madrid');
          $puja -> id_subasta = $id;
          $puja -> id_usuario = Auth::user()->id;
          $puja -> puja_auto = true;
          $puja -> save();
          if(SystemController::triggerPujasAuto($id,$puja->id)) {
            $subasta -> precio_actual = $puja -> cantidad;
            $subasta -> puja_ganadora = $puja -> id;
            $subasta -> save();
            $success = true;
          } else {
            $success = false;
          }
          return view('user.pujas.index', compact('success'));

        } else {
          $errorCant = true;
          return view('user.pujas.create', compact('subasta', 'errorCant'));
        }
      } else {
          $error = true;
          return view('user.pujas.index', compact('error'));
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */




    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {

      $puja = Puja::select('subastas.id','pujas.cantidad','pujas.fecha','subastas.nombre', 'subastas.precio_actual', 'subastas.estado_subasta')
      ->where('pujas.id_usuario', Auth::id())
      ->join('subastas', 'subastas.id', '=', 'pujas.id_subasta');

      return Datatables::of($puja)
      ->add_column('pujastatus','
      @if($estado_subasta)
        @if($precio_actual == $cantidad)
           <div class="green">Vas ganando</div>
           @else
           <div class="red">Vas perdiendo</div>
         @endif
      @else
        @if($precio_actual == $cantidad)
           <div class="green">Has ganado la subasta!</div>
           @else
           <div class="red">Has perdido la subasta</div>
         @endif
      @endif'
       )
          ->add_column('actions','<a href="{{{ URL::to(\'search/subasta/view/\'.$id ) }}}" class="btn btn-sm btn-default"><span class="glyphicon"></span> {{ trans("Ir a la subasta") }}</a>
                  ')
          ->remove_column('id')
          ->remove_column('precio_actual')
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
