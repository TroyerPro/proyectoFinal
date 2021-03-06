<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Puja;
use App\Confpujaauto;
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
use App\Http\Requests\Puja\PujaAutoRequest;

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
    public function postCreate($id, PujaAutoRequest $request)
    {
      $subasta = Subasta::find($id);
      if($subasta->estado_subasta) {
        if($_POST['maximo'] > $subasta->precio_actual) {
          $pujaAuto = new Confpujaauto();
          $pujaAuto->max_puja = $_POST['maximo'];
          $pujaAuto->incrementar = $_POST['increment'];
          $pujaAuto->id_usuario = Auth::user()->id;
          $pujaAuto->save();
          if (SystemController::triggerAutoVsAuto($id,$pujaAuto->id)) {
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
  }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {

      $puja=Puja::select('subastas.id','confpujaautos.max_puja','pujas.cantidad','subastas.precio_actual','subastas.nombre','confpujaautos.created_at','subastas.estado_subasta')
      ->where('pujas.id_usuario',Auth::id())
      ->join('confpujaautos','confpujaautos.id_puja','=','pujas.id')
      ->join('subastas','subastas.id','=','pujas.id_subasta')
      ->orderBy('confpujaautos.created_at','DESC');

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
          ->remove_column('cantidad')
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
