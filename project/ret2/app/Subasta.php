<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model {

	//
	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}

	public function factura()
    	{
        	return $this->hasOne('App\Factura');
    	}

	public function puja()
		   {
		      return $this->belongsTo('App\Puja');
		   }

	public function categoria()
			 {
					return $this->belongsTo('App\Categoria');
			 }
}
