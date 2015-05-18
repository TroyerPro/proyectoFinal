<?php namespace App\Http\Controllers\System;

use App\Subasta;

class SystemController extends Controller {



	public function checkSubasta($id)
	{
    $subasta = Subasta::find($id);

	}

}
