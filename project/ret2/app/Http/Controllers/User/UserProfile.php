<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Input;
use URL;
use Validator;
use Redirect;
use Request;
use Session;
use App\User;
class UserProfile extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show()
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

		// getting all of the post data
		$file = Request::file('image');


		$destinationPath = URL::asset('img/profile/'); // upload path
		$extension = 'jpg'; // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$currentuser -> imagen = $fileName;
		$currentuser->save();
		$file->move($destinationPath, $fileName); // uploading file to given path
		// sending back with message

	return view('user.profile.imagen', compact('currentuser','success'));
}

}
