<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Subasta;
use App\Video;
use App\Categoria;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Inicio";

        $subasta = Subasta::count();
        $newscategory = Categoria::count();
        $users = User::count();
		return view('admin.dashboard.index',  compact('title','subasta','newscategory','users'));
	}
}
