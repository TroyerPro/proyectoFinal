<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	//

	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}

	public function subasta()
			{
					return $this->belongsTo('App\Subasta');
			}
}
