<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $fillable = [ 'valor', 'descripcion'];
	//

	public function evaluacion()
			{
					return $this->belongsTo('App\Evalusuarios');
			}
}
