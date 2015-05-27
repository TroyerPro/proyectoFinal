<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ChatusuariosTableSeeder extends Seeder {

	public function run()
	{
		\App\Chatusuarios::create([
			'id_user1' => '2',
			'id_user2' => '3',
			'id_subasta'=>'1',
		]);

		\App\Chatusuarios::create([
			'id_user1' => '3',
			'id_user2' => '2',
			'id_subasta'=>'2',
		]);

		\App\Chatusuarios::create([
			'id_user1' => '3',
			'id_user2' => '4',
			'id_subasta'=>'3',
		]);

	}

}
