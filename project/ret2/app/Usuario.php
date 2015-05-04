<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $fillable = [ 'nombre', 'apellidos', 'username', 'email', 'password' ,'ratingcomprador','ratingvendedor','admin' ];
	//

	public function empresa()
	    {
	        return $this->belongsTo('App\Empresa');
	    }

	public function valoraciones()
			 {
			    return $this->hasMany('App\Evalusuarios');
			 }

	public function chats()
			 {
						return $this->hasMany('App\Chatusuarios');
				}

	public function subastas()
		{
				return $this->hasMany('App\Subasta');
		}

	public function subastasAuto()
		{
				return $this->hasMany('App\Confpujaauto');
		}

	public function facturas()
		{
				return $this->hasMany('App\Factura');
		}

	public function pujas()
		{
				return $this->hasMany('App\Puja');
		}


}
