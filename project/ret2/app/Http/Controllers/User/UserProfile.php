<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
class UserProfile extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$name = $currentuser-> name;
		return view('user.profile.view', compact('currentuser'));
	}

	public function postEdit() //falta $id
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$currentuser-> name = $_POST['nombre'];
		$currentuser-> surname = $_POST['apellidos'];
		$currentuser-> nif = $_POST['nif'];
		$currentuser-> email = $_POST['email'];
		$currentuser->save();
		$success = true;
		return view('user.profile.view', compact('currentuser', 'success'));
	}

	public function getPassword()
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$name = $currentuser-> name;
		return view('user.profile.password', compact('currentuser'));
	}
	public function postPassword()
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);

		if($_POST['pass']==$_POST['pass2']) {
			$currentuser -> password = 	bcrypt($_POST['pass']);
			$success = true;
			$currentuser->save();
		} else {
			$success = false;
		}

		return view('user.profile.password', compact('currentuser', 'success'));
	}

	public function getImagen()
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		return view('user.profile.imagen', compact('currentuser'));
	}

	public function postImagen()
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$success = true;
		return view('user.profile.imagen', compact('currentuser','success'));
	}

}
