<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConfpujaautoTableSeeder extends Seeder {

	public function run()
	{

		TestDummy::times(3)->create('App\Confpujaauto');

	}

}