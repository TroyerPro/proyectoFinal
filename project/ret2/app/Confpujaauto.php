<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Confpujaauto extends Model {

	//

	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}

	public function puja()
		   {
		       return $this->hasOne('App\Puja');
		   }
}
