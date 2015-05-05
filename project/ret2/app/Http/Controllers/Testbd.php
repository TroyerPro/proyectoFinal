<?php namespace App\Http\Controllers;

use App\Categoria;

class Testbd extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id)
	{
		// Get all the blog posts
		$cat = Categoria::find($id);
 		//dd($news);
		return view('testadri.testbd', compact('cat'));
	}

}
