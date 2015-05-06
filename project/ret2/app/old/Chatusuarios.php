<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatusuarios extends Model {

	//

	public function lineas()
			 {
			    return $this->hasMany('App\Lineachat');
			 }

	public function usuario()
			  {
			      return $this->belongsTo('App\Usuario');
			  }
}