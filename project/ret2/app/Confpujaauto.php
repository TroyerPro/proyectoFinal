<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Confpujaauto extends Model {

	protected $fillable = [ 'max_puja', 'incrementar'];
	//


	public function usuario()
			{
					return $this->belongsTo('App\Usuario');
			}

	public function puja()
		   {
		       return $this->hasOne('App\Puja');
		   }
}
