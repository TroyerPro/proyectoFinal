<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineachat extends Model {

	protected $fillable = [ 'fecha', 'text'];
	//

	public function chat()
			{
					return $this->belongsTo('App\Chatusuarios');
			}
}
