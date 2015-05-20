<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model {

	protected $fillable = [ 'cantidad', 'fecha','puja_auto','id_subasta','id_usuario'];
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
