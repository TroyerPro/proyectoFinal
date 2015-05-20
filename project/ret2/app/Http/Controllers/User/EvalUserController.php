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
        $bid=Subasta::select('subastas.puja_ganadora')
                      ->where('subastas.id',$id)
                      ->get()
                      ->first();
        //id ganador a traves de la puja
        $ganador=Puja::select('pujas.id_usuario')
                        ->where('pujas.id',$bid->puja_ganadora)
                        ->get()
                        ->first();
        //datos ganador a traves de la puja
        $buyer=User::select('users.id','users.name')
                      ->where('users.id',$ganador->id_usuario)
                      ->get()
                      ->first();

        return view('user.subasta.evaluser', compact('rating','buyer'));
    }

}
