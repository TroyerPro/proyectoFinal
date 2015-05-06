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
 		//dd($news);
		return view('search.user', compact('user'));
	}

}
