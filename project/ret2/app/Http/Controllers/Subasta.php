<?php namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Photo;
use App\PhotoAlbum;
use App\Language;
use App\Http\Requests\Admin\PhotoRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Helpers\Thumbnail;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Html\HtmlBuilder;

class Subasta extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show()
	{
		return view('subasta.subasta');
	}

}
