<?php namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;

class SearchSubasta extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{
		return view('subasta.search');
	}

}
