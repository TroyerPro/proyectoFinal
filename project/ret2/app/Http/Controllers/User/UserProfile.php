<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ImagenRequest;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Input;
use URL;
use Validator;
use Redirect;
use Request;
use Session;
use App\User;
use App\Subasta;
use App\Http\Requests\User\ProfileRequest;
use App\Http\Requests\User\PasswordRequest;

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

	public function getBaja()
	{
		$subasta = Subasta::select('subastas.id','subastas.estado_subasta','subastas.nombre','subastas.fecha_final')
		->where('subastas.id_user_vendedor', Auth::user()->id)
		->where('subastas.estado_subasta', 1)->count();
		$id=Auth::user()->id;
		$currentuser = User::find($id);

		if($subasta > 0) {
			$error = true;
			return view('user.profile.view', compact('currentuser','error'));
		} else {
			$currentuser->usable = false;
			$currentuser->save();

			return redirect('auth/logout');
		}
	}

	public function postBaja()
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);

		return view('user.profile.baja', compact('currentuser', 'success'));
	}

	public function postEdit(ProfileRequest $request)
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$currentuser-> name = $_POST['nombre'];
		$currentuser-> surname = $_POST['apellidos'];
		$currentuser-> nif = $_POST['nif'];
		$currentuser-> ciudad=$_POST['ciudad'];
		$currentuser-> email = $_POST['email'];
		$currentuser-> descripcion =$_POST['texto'];
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
	
	public function postPassword(PasswordRequest $request)
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);

		if($currentuser->password == $_POST['oldpass']) {
			if($_POST['pass']==$_POST['pass2']) {
				$currentuser -> password = 	bcrypt($_POST['pass']);
				$success = true;
				$currentuser->save();
			}
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

	public function postImagen(ImagenRequest $request)
	{
		$id=Auth::user()->id;
		$currentuser = User::find($id);
		$success = true;


		$picture = "";
		if($request->hasFile('image'))
		{
				$file = $request->file('image');
				$filename = $file->getClientOriginalName();
				$extension = $file -> getClientOriginalExtension();
				$picture = sha1($filename . time()) . '.' . $extension;
		}


		if($request->hasFile('image'))
		{
				$destinationPath = public_path() . '/img/profile/';
				$request->file('image')->move($destinationPath, $picture);
/*
				$path2 = public_path() . '/appfiles/photoalbum/' . $photoalbum->folder_id . '/thumbs/';
				Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);*/

		}

		$currentuser->imagen = $picture;

		$currentuser->save();

		return view('user.profile.view', compact('currentuser','success'));

}

}
