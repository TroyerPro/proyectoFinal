<?php namespace App\Http\Controllers;

class UserProfile extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('user.profile.view');
	}

}
