<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\User;
use App\Evalusuarios;
use App\Rating;
use App\Subasta;
use App\Puja;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class EvalUserController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function show($id)
    {
        $rating=Rating::all();

        //id de la puja ganadora
        $subasta=Subasta::select('subastas.id','subastas.puja_ganadora','subastas.id_user_vendedor')
                      ->where('subastas.id',$id)
                      ->get()
                      ->first();

        if ($subasta->id_user_vendedor !=  Auth::id()){

          //vendedor de la subasta
          $usuario=User::select('users.id','users.name')
                      ->where('users.id',$subasta->id_user_vendedor)
                      ->get()
                      ->first();
          $vendedor=true;
        }else{

          //id ganador a traves de la puja
          $ganador=Puja::select('pujas.id_usuario')
                          ->where('pujas.id',$subasta->puja_ganadora)
                          ->get()
                          ->first();

          //datos ganador a traves de la puja
          $usuario=User::select('users.id','users.name')
                        ->where('users.id',$ganador->id_usuario)
                        ->get()
                        ->first();
                        $vendedor=false;
        }

        return view('user.subasta.evaluser', compact('rating','usuario','subasta','vendedor'));
    }

    public function postEvaluar($id)
    {
      $nota=$_POST['rating'];
      $comentario=$_POST['comentario'];
      $vendedor=$_POST['vendedor'];

      $evaluado=User::select('users.id')
                      ->where('users.name',$_POST['nombre'])
                      ->get()
                      ->first();

      $evaluacion = new Evalusuarios();
      $evaluacion -> comentario=$comentario;
      $evaluacion -> id_rating=$nota;
      $evaluacion -> id_user_evaluador = Auth::id();
      $evaluacion -> id_user_evaluado= $evaluado->id;
      $evaluacion -> id_subasta=$id;
      $evaluacion -> vendedor=$vendedor;
      $evaluacion ->save();

      

      return view('user.subasta.index');
    }


}
