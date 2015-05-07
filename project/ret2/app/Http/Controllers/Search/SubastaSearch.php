<?php namespace App\Http\Controllers\Search;

use App\Subasta;
use App\Categoria;
use App\Http\Controllers\Controller;
use Datatables;

class SubastaSearch extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show() //falta $id
	{

		$bid = Subasta::all();
		$categoria = Categoria::all();
		//dd($news);
		return view('search.subasta', compact('bid','categoria'));
		//return view('search.subasta');
	}
/*
  public function data()
  {

      $bid = Subasta::select('subasta.id','subasta.nombre','subasta.precio_actual','subasta.fecha_final');

      return Datatables::of($bid)
         ->add_column('<input type="hidden" name="row" value="{{$id}}" id="row">')
          ->remove_column('id')

          ->make();
  }
*/
}
