<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	//
	public function evaluacion()
			{
					return $this->belongsTo('App\Evalusuarios');
			}
}
