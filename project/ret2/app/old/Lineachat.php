<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineachat extends Model {

	//

	public function chat()
			{
					return $this->belongsTo('App\Chatusuarios');
			}
}
