<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Categoria;
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
        $title = "Dashboard";

        $news = Article::count();
        $newscategory = Categoria::count();
        $users = User::count();
        $photo = Photo::count();
        $photoalbum = PhotoAlbum::count();
        $video = Video::count();
        $videoalbum = VideoAlbum::count();
		return view('user.dashboard.index',  compact('title','news','newscategory','video','videoalbum','photo',
            'photoalbum','users'));
	}
}
