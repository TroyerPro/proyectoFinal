<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SubastaTableSeeder extends Seeder {

	public function run()
	{

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_factura' => "1",
			'id_categoria'=> "1",
			'nombre' => 'Camiseta Real Madrid',
			'descripcion' => 'Camiseta nueva del Real Madrid temporada 14/15, 1a equipación',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>false,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-03-04'),
			'fecha_inicio' => date('2015-02-04'),
			'precio_inicial' => 5,
			'precio_actual' => 70,
			'imagen' => "realmadrid.png",
			'puja_ganadora' => 1
		]);

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_factura' => "2",
			'id_categoria'=> "2",
			'nombre' => 'Camisa PdH',
			'descripcion' => 'Camisa azul cielo de la marca Pedro del Hierro',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>false,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-02-20'),
			'fecha_inicio' => date('2015-01-20'),
			'precio_inicial' => 30,
			'precio_actual' => 50,
			'imagen' => "pdh.png",
			'puja_ganadora' => 2
		]);

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "3",
			'nombre' => 'Bolso Michael Kors',
			'descripcion' => 'Precioso bolso marca Michael Kors de color azul electrico',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-09-20'),
			'fecha_inicio' => date('2015-01-20'),
			'precio_inicial' => 50,
			'precio_actual' => 124,
			'imagen' => "bolsoMK.png",
			'puja_ganadora' => 3
		]);

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "4",
			'nombre' => 'Ratón de bola',
			'descripcion' => 'Ratón blanco antiguo de bola, como nuevo',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-11-20'),
			'fecha_inicio' => date('2015-01-20'),
			'precio_inicial' => 50,
			'precio_actual' => 0,
			'imagen' => "raton.png",
		]);

		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "5",
			'nombre' => 'Enanitos de jardín',
			'descripcion' => 'Preciosa pareja de enanitos para jadín',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-05-22'),
			'fecha_inicio' => date('2015-01-20'),
			'precio_inicial' => 50,
			'precio_actual' => 0,
			'imagen' => "enanosJardin.png",
		]);



		//TestDummy::times(10)->create('App\Subasta');

	}

}
