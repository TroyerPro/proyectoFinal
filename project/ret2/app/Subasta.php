<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model {

	protected $fillable = [ 'nombre', 'descripcion','metodo_pago','metodo_envio','estado_subasta','estado','fecha_final', 'fecha_inicio', 'fecha_prorroga' ,'precio_inicial','precio_actual','imagen','puja_ganadora' ];
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
