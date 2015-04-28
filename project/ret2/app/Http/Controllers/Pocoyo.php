<?php namespace App\Http\Controllers;

class Pocoyo extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show()
	{
		return view('pocoyo.pocoyo');
	}

}
