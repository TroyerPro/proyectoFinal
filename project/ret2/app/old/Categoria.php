<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	//

	public function subastas()
			{
					return $this->hasMany('App\Subasta');
			}
}
