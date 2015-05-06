<?php namespace App\Http\Controllers\Search;

use App\Subasta;
use App\Http\Controllers\Controller;

class SubastaSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{

		$bid = Subasta::all();
		//dd($news);
		return view('search.subasta', compact('bid'));
		//return view('search.subasta');
	}


}
