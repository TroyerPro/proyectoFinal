<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Evalusuarios extends Model {

	protected $fillable = [ 'comentario', 'id_rating','id_user_evaluador','id_user_evaluado','id_subasta'];
	//

			public function usuario()
					{
							return $this->belongsTo('App\User');
					}


			public function evaluaciones()
					{
							return $this->hasMany('App\Rating');
					}

			public function subastas()
					{
							return $this->hasMany('App\Subasta');
					}

}
