<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		\App\User::create([
			'name' => 'Admin User',
			'surname'=>'admin_user',
			'username' => 'admin_user',
			'nif'=>'nifAdmin',
			'imagen'=>'admin.png',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'usable' => true,
			'actividad' => false,
			'ratingvendedor' => 5,
			'ratingcomprador' => 5,
			'confirmed' => 1,
            'admin' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Adria',
			'surname'=>'Mondejar',
			'username' => 'Sombe',
			'Ciudad' => 'Granollers',
			'nif'=>'44444444E',
			'imagen'=>'adri.png',
			'email' => 'amdadria@hotmail.com',
			'password' => bcrypt('122122'),
			'usable' => true,
			'ratingvendedor' => 5,
			'ratingcomprador' => 4,
			'empresa_id'=>1,
			'fecha_nacimiento'=>1989-09-12,
		]);

		\App\User::create([
			'name' => 'Sergio',
			'surname'=>'Gonzalez',
			'username' => 'Troyer',
			'Ciudad' => 'Roca del Vallés',
			'nif'=>'12345678A',
			'imagen'=>'sergio.png',
			'email' => 'sergiogg1337@gmail.com',
			'password' => bcrypt('122122'),
			'usable' => true,
			'ratingvendedor' => 3.5,
			'ratingcomprador' => 5,
			'empresa_id'=>1,
			'fecha_nacimiento'=>1990-02-20,
		]);

		\App\User::create([
			'name' => 'Javier',
			'surname'=>'Bufo',
			'username' => 'Zaverius',
			'Ciudad' => 'Granollers',
			'nif'=>'89510027U',
			'imagen'=>'javi.png',
			'email' => 'javitobufo@gmail.com',
			'password' => bcrypt('122122'),
			'usable' => true,
			'ratingcomprador' => 1,
			'empresa_id'=>1,
			'fecha_nacimiento'=>1991-05-17,
		]);

		\App\User::create([
			'name' => 'Marc',
			'surname'=>'Picazos',
			'username' => 'Noburo',
			'Ciudad' => 'Montornés',
			'nif'=>'98765432W',
			'imagen'=>'marc.png',
			'email' => 'picasso.m91@gmail.com',
			'password' => bcrypt('122122'),
			'usable' => true,
			'empresa_id'=>1,
			'fecha_nacimiento'=>1991-05-04,
		]);

	}

}
