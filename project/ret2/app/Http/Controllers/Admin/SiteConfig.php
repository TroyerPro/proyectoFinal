<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SiteConfig extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('admin.configsite');
	}

}
