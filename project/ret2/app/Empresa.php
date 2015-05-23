<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $fillable = [ 'nombre', 'direccion','precio_prorroga','dias_subasta_gratis','tiempo_inactividad'];
	//

	public function usuarios()
	    {
	        return $this->hasMany('App\User');
	    }
}
