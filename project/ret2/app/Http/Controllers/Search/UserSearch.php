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
		$user = User::all();
		if (isset($_REQUEST['nombre'])) {
			$datos=$_REQUEST;
			$user2 = User::select('users.*')->where('users.name','like','%'.$datos['nombre'].'%')->get();
		}else{
			$user2 = $user;
		}
		return view('search.user', compact('user','user2'));
	}

}
