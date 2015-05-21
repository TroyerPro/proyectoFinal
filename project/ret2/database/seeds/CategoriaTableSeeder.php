<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoriaTableSeeder extends Seeder {

	public function run()
	{

		\App\Categoria::create([
			'nombre' => 'Deporte',
			'descripcion' => 'Cosas orientadas a hacer deporte',
		]);
		\App\Categoria::create([
			'nombre' => 'Moda Masculina',
			'descripcion' => 'Objetos de moda masculina',
		]);
		\App\Categoria::create([
			'nombre' => 'Moda Femenina',
			'descripcion' => 'Objetos de moda femenina',
		]);
		\App\Categoria::create([
			'nombre' => 'Tecnologia',
			'descripcion' => 'Objetos tecnologicos',
		]);
		\App\Categoria::create([
			'nombre' => 'Complementos de Jardín',
			'descripcion' => 'Decoracion de jardin',
		]);

	//	TestDummy::times(8)->create('App\Categoria');

	}

}
