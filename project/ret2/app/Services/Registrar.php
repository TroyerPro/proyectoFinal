<?php namespace App\Services;

use App\User;
use Validator;
use Carbon\Carbon;
use DateTimeZone;
use DateTime;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		$dia=31;
		if ($data['ano']) {
			if ((($data['ano']%4 == 0 && $data['ano']%100 != 0) || $data['ano']%400 == 0) and $data['mes']==02) {
				$dia=29;
			}elseif($data['mes']==02){
				$dia=28;
			}elseif ($data['mes']==01 or $data['mes']==03 or $data['mes']==05
			or $data['mes']==07 or $data['mes']==08 or $data['mes']==10 or $data['mes']==12) {
				$dia=31;
			}else{
				$dia=30;
			}
		}

		$fechaHoy=Carbon::now(new DateTimeZone('Europe/Madrid'));
		$edadMinima=$fechaHoy->year - 18;

		return Validator::make($data, [
			'nif' => 'required|regex:/^[0-9]{8}[A-Z]$/',
			'name' => 'required|min:3|max:50|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
			'surname' => 'required|min:3|max:255',
			'dia' => 'required|integer|min:1|max:'.$dia.'',
			'mes' => 'required|integer|min:01|max:12',
			'ano' => 'required|integer|min:1900|max:'.$edadMinima.'',
			'city' => 'required|min:3|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
			'username' => 'required|unique:users|min:3|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'present' => 'required|min:5',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$formato = 'Y-m-d';
		$formFecha =$data['ano'].'-'.$data['mes'].'-'.$data['dia'];
		$fecha = DateTime::createFromFormat($formato, $formFecha);

		$user = User::create([
			'name' => $data['name'],
			'surname' => $data['surname'],
			'username' => $data['username'],
			'nif' => $data['nif'],
			'imagen' => 'sample.jpg',
			'fecha_nacimiento' => $fecha,
			'ciudad' => $data['city'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'descripcion' => $data['present'],
			'confirmed' => 0,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		$user-> fecha_nacimiento = $fecha;
		$user-> save();
		return $user;
	}

}
