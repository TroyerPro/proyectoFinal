<?php namespace App;


use Illuminate\Database\Eloquent\Model;


class Empresa extends Model {


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'name', 'username', 'email', 'password', 'confirmed' ,'confirmation_code' ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 'password', 'remember_token' ,'confirmation_code'  ];


	public function usuarios()
	{
		return $this->hasMany('App\Usuario');
	}
}
