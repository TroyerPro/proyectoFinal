<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model {

	//

	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}


	public function subastas()
			{
					return $this->hasMany('App\Subasta');
			}

	public function pujaAuto()
			{
					return $this->belongsTo('App\Confpujaauto');
			}
}
