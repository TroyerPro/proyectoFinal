<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	protected $fillable = [ 'fecha', 'precio','id_usuario'];
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
