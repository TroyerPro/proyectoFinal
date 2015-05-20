<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineachat extends Model {

	protected $fillable = [ 'fecha','id_usuario', 'text','id_chat'];
	//

	public function chat()
			{
					return $this->belongsTo('App\Chatusuarios');
			}

			public function users()
					{
							return $this->belongsTo('App\User');
					}
}
