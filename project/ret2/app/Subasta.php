<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Puja;

class Subasta extends Model {

	protected $fillable = [ 'nombre', 'descripcion','metodo_pago','metodo_envio','estado_subasta','estado','fecha_final', 'fecha_inicio', 'fecha_prorroga' ,'precio_inicial','precio_actual','imagen','puja_ganadora','id_user_vendedor','id_factura','id_categoria','fecha_final_antes_prorroga','prorrogado'];
	//
	public function getpujaGanadora()
				{
					return Puja::find($this->puja_ganadora);
				}

	public function user()
			{
					return $this->belongsTo('App\User');
			}

	public function factura()
    	{
        	return $this->hasOne('App\Factura');
    	}

	public function pujaGanadora()
		   {
		      return $this->belongsTo('App\Puja','puja_ganadora');
		   }

	public function categoria()
			 {
					return $this->belongsTo('App\Categoria');
			 }

	public function chat()
			 {
					return $this->belongsTo('App\Chatusuarios');
			 }

}
