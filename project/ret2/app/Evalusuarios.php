<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Evalusuarios extends Model {

	//

	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}


		public function evaluaciones()
				{
						return $this->hasMany('App\Rating');
				}

}
