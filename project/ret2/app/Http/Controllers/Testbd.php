<?php namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\Admin\NewsCategoryRequest;

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

//Pendiente de testing
	public function delete(DeleteRequest $request,$id)
	{
		//recupero la categoria a eliminar
		$cat = ArticleCategory::find($id);
		//la elimino de la bd
		$cat->delte();

	}

}
