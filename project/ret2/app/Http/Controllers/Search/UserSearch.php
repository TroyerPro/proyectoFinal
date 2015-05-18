<?php namespace App\Http\Controllers\Search;

use App\User;
use App\Http\Controllers\Controller;

class UserSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{

		if (isset($_REQUEST['nombre'])) {
			$datos=$_REQUEST;
			$user = User::select('users.*')->where('users.name','like','%'.$datos['nombre'].'%')->get();
		}else{
			$user = User::all();
		}
		return view('search.user', compact('user'));
	}

}
