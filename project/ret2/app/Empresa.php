<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $fillable = [ 'nombre', 'direccion','precio_prorroga','dias_subasta_gratis'];
	//

	public function usuarios()
	    {
	        return $this->hasMany('App\Usuario');
	    }
}
