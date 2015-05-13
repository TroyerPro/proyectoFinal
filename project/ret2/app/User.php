<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'name','surname','nif','ciudad','fecha_nacimineto','descripcion','email','username', 'password','ratingcomprador','ratingvendedor','admin', 'confirmed' ,'confirmation_code' ,'imagen'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 'password', 'remember_token' ,'confirmation_code'  ];

	public function articles ()
			{
					return $this->hasMany('App\Article');
				}

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

		public function lineachats()
			{
					return $this->hasMany('App\Lineachat');
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
