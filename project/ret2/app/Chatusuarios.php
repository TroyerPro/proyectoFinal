<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatusuarios extends Model {

	protected $fillable = [ 'id_user1','id_user2','id_subasta'];

	public function lineas()
			 {
			    return $this->hasMany('App\Lineachat');
			 }

	public function usuario()
			  {
			      return $this->belongsTo('App\Usuario');
			  }
	public function subasta()
			  {
						return $this->belongsTo('App\Subasta');
				}
}
