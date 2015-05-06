<?php namespace App\Http\Controllers\Subasta;

use App\Subasta;
use App\User;
use App\Http\Controllers\Controller;

class View extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id) //falta $id
	{
		$subasta = Subasta::find($id);
		$user = User::find($subasta->id_user_vendedor);
		return view('subasta.view', compact('subasta','user'));
	}

}
