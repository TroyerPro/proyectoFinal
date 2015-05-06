<?php namespace App\Http\Controllers\Search;

use App\User;
use App\Http\Controllers\Controller;

class User extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		$user = Users::all();

		return view('search.user', compact('user'));
	}

}
