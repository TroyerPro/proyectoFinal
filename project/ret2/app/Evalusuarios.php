<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Evalusuarios extends Model {

	protected $fillable = [ 'comentario', 'fecha','id_rating','id_user_evaluador','id_user_evaluador'];
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
