<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SubastaTableSeeder extends Seeder {

	public function run()
	{

		//#######################################################
		//##                     Acabadas                      ##
		//#######################################################

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


		//#######################################################
		//##                    No acabadas                    ##
		//#######################################################
		/*
			(1)moda
			(2)electronica
			(3)casayjardi
			(4)motor:recambiosyaccesorios
			(5)deportesyocio
		*/
		//5
		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "1",
			'nombre' => 'Bolso Michael Kors',
			'descripcion' => 'Precioso bolso marca Michael Kors de color azul electrico',
			'metodo_pago' => 'Paypal',
			'metodo_envio' => 'Servicio postal privado',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-05-26'),
			'precio_inicial' => 80,
			'precio_actual' => 120,
			'imagen' => "bolsoMK.png",
			//6
		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "1",
			'nombre' => 'Americana extra slim fit \'Raye2\' en lana virgen por BOSS',
			'descripcion' => 'El modelo lleva la talla EU:50, con una estatura de 188 cm, perimetro toracico de 93 cm, perímetro de cintura de 78 cm y caderas de 104 cm',
			'metodo_pago' => 'Paypal',
			'metodo_envio' => 'Recoger en persona',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-04-30'),
			'precio_inicial' => 250,
			'precio_actual' => 260,
			'imagen' => "americanaHB.png",
			'puja_ganadora' =>
		]);
//7
		\App\Subasta::create([
			'id_user_vendedor' => "2",
			'id_categoria'=> "5",
			'nombre' => 'Camiseta Real Madrid',
			'descripcion' => 'Camiseta nueva del Real Madrid temporada 14/15, 1a equipación',
			'metodo_pago' => 'Paypal',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-01-18'),
			'precio_inicial' => 35,
			'precio_actual' => 0,
			'imagen' => "realmadrid.png",

		]);
//8
		\App\Subasta::create([
			'id_user_vendedor' => "3",
			'id_categoria'=> "2",
			'nombre' => 'Samsung UE50H6200 50" LED 3D - Televisión',
			'descripcion' => 'Resolución 1.920 x 1.080 Full HD, DTS Premium Sound / DTS Premium Sound 5.1 DTS Premium Sound 5.1
			,Skype™ on Samsung TV, HDMI 4, USB 3,Samsung 3D, Conversor 2D a 3D',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal privado',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-05-26'),
			'precio_inicial' => 150,
			'precio_actual' => 0,
			'imagen' => "samsungTV.png",
		]);
		//9
		\App\Subasta::create([
			'id_user_vendedor' => "3",
			'id_categoria'=> "3",
			'nombre' => 'Mesa de centro, gris, vidrio',
			'descripcion' => 'Anchura: 94cm  Altura:7cm  Largo:99cm   Peso:19.50 kg',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Viejo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-05-26'),
			'precio_inicial' => 10,
			'precio_actual' => 12,
			'imagen' => "mesa.png",
			'puja_ganadora' =>
		]);
//10
		\App\Subasta::create([
			'id_user_vendedor' => "3",
			'id_categoria'=> "4",
			'nombre' => 'Led Bombilla faros Coche',
			'descripcion' => '2x H3 68 SMD Led Bombilla Luz Luces Lámpara faros Coche',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-03-20'),
			'precio_inicial' => 2,
			'precio_actual' => 3,
			'imagen' => "ledBombilla.png",
			'puja_ganadora' =>
		]);
		//11
		\App\Subasta::create([
			'id_user_vendedor' => "4",
			'id_categoria'=> "1",
			'nombre' => 'Ray-Ban Clásico Aviator Sunglasses',
			'descripcion' => 'Polarizadas, Ancho de las lentes: 5.8 centímetros,
			 Alto de las lentes: 49 milímetros, Puente: 17 milímetros, Lentes Polarizadas,
			 Dimensiones:: 58-14-135 FEED_BULLET_MEASURE,
			 Item reference number: RB3025 001/58, Model: Varón',
			'metodo_pago' => 'Metálico',
			'metodo_envio' => 'Recoger en persona',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-04-10'),
			'precio_inicial' => 50,
			'precio_actual' => 0,
			'imagen' => "rayban.png",
		]);
//12
		\App\Subasta::create([
			'id_user_vendedor' => "4",
			'id_categoria'=> "2",
			'nombre' => 'Disco duro 1TB',
			'descripcion' => 'Seagate Barracuda 7200.14 1TB SATA3',
			'metodo_pago' => 'Metálico',
			'metodo_envio' => 'Recoger en persona',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-03-17'),
			'precio_inicial' => 20,
			'precio_actual' => 30,
			'imagen' => "barracuda.png",
			'puja_ganadora' =>
		]);
		//13
		\App\Subasta::create([
			'id_user_vendedor' => "4",
			'id_categoria'=> "4",
			'nombre' => 'Funda para coche',
			'descripcion' => 'Silverline 774618 Funda para coche - talla grande 4.820 x 1.190 x 1.770 mm (L)',
			'metodo_pago' => 'Metálico',
			'metodo_envio' => 'Recoger en persona',
			'estado_subasta' =>true,
			'estado' => 'Viejo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-05-05'),
			'precio_inicial' => 5,
			'precio_actual' => 6,
			'imagen' => "funcaCoche.png",
			'puja_ganadora' =>
		]);
//14
		\App\Subasta::create([
			'id_user_vendedor' => "5",
			'id_categoria'=> "3",
			'nombre' => 'Silla WOODEN Classic Edition Blanco',
			'descripcion' => 'Silla WOODEN Classic Edition Blanco',
			'metodo_pago' => 'Paypal',
			'metodo_envio' => 'Servicio postal publico',
			'estado_subasta' =>true,
			'estado' => 'Viejo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-02-18'),
			'precio_inicial' => 15,
			'precio_actual' => 20,
			'imagen' => "sillaWooden.png",
			'puja_ganadora' =>
		]);

		//15
		\App\Subasta::create([
			'id_user_vendedor' => "5",
			'id_categoria'=> "5",
			'nombre' => 'Muñequeras',
			'descripcion' => 'Muñequera para levantamiento de pesas,
			 Antideslizante y absorbente,
			 El levantamiento de la longitud : aprox. 15,9 pulgadas / 40,5 cm,
			 Apoyo la muñeca de neopreno tamaño: aprox. 7.68 x 2,76 pulgadas / 19,5 x 7 cm,
			 Circuntancia total: aprox. 16.14 pulgadas / 41 cm',
			'metodo_pago' => 'Tarjeta',
			'metodo_envio' => 'Servicio postal privado',
			'estado_subasta' =>true,
			'estado' => 'Nuevo',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-01-20'),
			'precio_inicial' => 3,
			'precio_actual' => 0,
			'imagen' => "muñequera.png",
		]);
//16
		\App\Subasta::create([
			'id_user_vendedor' => "5",
			'id_categoria'=> "5",
			'nombre' => 'Juego de pesas (20 kg)',
			'descripcion' => 'Confidence - Juego de pesas (20 kg)',
			'metodo_pago' => 'Metálico',
			'metodo_envio' => 'Recoger en persona',
			'estado_subasta' =>true,
			'estado' => 'Usado',
			'fecha_final' => date('2015-06-26'),
			'fecha_inicio' => date('2015-05-29'),
			'precio_inicial' => 10,
			'precio_actual' => 18,
			'imagen' => "mancuernas.png",
			'puja_ganadora' =>
		]);



	}

}
