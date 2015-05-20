<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		\App\User::create([
			'name' => 'Admin User',
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
			'name' => 'Test User',
			'username' => 'test_user',
			'nif'=>'nifUser',
			'imagen'=>'db6bee3c20ba251ea31b1ab70d4e0dbf82785999.jpg',
			'email' => 'user@user.com',
			'password' => bcrypt('user'),
			'usable' => true,
			'ratingvendedor' => 5,
			'ratingcomprador' => 5,
			'actividad' => false,
			'confirmed' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		TestDummy::times(10)->create('App\User');

	}

}
