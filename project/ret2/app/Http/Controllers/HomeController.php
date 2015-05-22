<?php namespace App\Http\Controllers;

use App\Subasta;
use App\Categoria;
use App\Article;
use App\Photo;
use App\VideoAlbum;
use App\Http\Controllers\System\SystemController;
use App\PhotoAlbum;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');

		//parent::__construct();

		//$this->news = $news;
		//$this->user = $user;
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		SystemController::cerrarSubastas();
		$categoria = Categoria::all();
		$subasta = Subasta::select('subastas.*')->where('subastas.estado_subasta',true)->get();




		return view('pages.home', compact('categoria', 'subasta'));
	}

}
