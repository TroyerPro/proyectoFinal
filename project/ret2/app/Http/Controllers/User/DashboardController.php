<?php namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Subasta;
use App\Puja;
use App\Video;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;

class DashboardController extends UserController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $usuario = Auth::id();
        $title = "Dashboard";
        $subasta = Subasta::where('subastas.id_user_vendedor',$usuario)->count();
        $puja = Puja::where('pujas.id_usuario',$usuario)->count();
        $finalizadas = Subasta::where('subastas.estado_subasta',false)->where('subastas.id_user_vendedor',$usuario)->count();

		return view('user.dashboard.index',  compact('title','subasta','puja','finalizadas'));
	}
}
