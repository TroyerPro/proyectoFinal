<?php

$faker->locale('en_US'); // set Locale of faked data - see https://github.com/fzaninotto/Faker/tree/master/src/Faker/Provider
$faker->seed(1234); // manage image library

$factory('App\User', [
    'name' => $faker->name,
    'surname' => $faker->name,
    'nif' => $faker->numberBetween(000000000,999999999),
    'username' => $faker->unique()->userName,
    'email' => $faker->email,
    'fecha_nacimiento'=> $faker->dateTime($format = 'd-m-Y', $max = 'now'),
    'imagen'=> "sample.jpg",
    'ciudad' => $faker->city,
    'descripcion' => $faker->paragraph,
    'password' => bcrypt("penelargo"),
    'ratingcomprador' => $faker->numberBetween(1,3),
    'ratingvendedor' => $faker->numberBetween(1,3),
    'admin' => $faker->boolean(50),
    'usable' => $faker->boolean(50),
    'actividad' => $faker->boolean(50),
    'confirmed' => $faker->boolean(50),
    'confirmation_code' => md5(microtime() . env('APP_KEY')),
]);


$factory('App\Categoria', [
    'nombre' => $faker->name,
    'descripcion' => $faker->paragraph,
]);

$factory('App\Subasta', [
    'nombre' => $faker->name,
    'descripcion' => $faker->paragraph,
    'metodo_pago' => 'PayPal',
    'metodo_envio' => 'Servicio postal publico',
    'estado_subasta' => $faker->boolean(50),
    'estado'=>'Usado',
    'fecha_final' => $faker->dateTime(),
    'fecha_inicio'=> $faker->dateTime(),
    'fecha_prorroga'=> $faker->dateTime(),
    'precio_inicial' => $faker->numberBetween(1,3),
    'precio_actual' => $faker->numberBetween(20,30),
    'imagen' => "sandia.jpg",
    'puja_ganadora' => $faker->numberBetween(1,3),
    'id_categoria' => $faker->numberBetween(1,3),
    'id_user_vendedor' => $faker->numberBetween(1,3),
    'id_factura' => $faker->numberBetween(1,1),
]);

  $factory('App\Empresa', [
    'nombre' => $faker->name,
    'direccion' => $faker->name,
    'precio_prorroga' => '100',
    'dias_subasta_gratis'=> '30',
    'tiempo_inactividad' => '360',
  ]);

  $factory('App\Chatusuarios', [
      'id_user1' => $faker->numberBetween(1,2),
      'id_user2' => $faker->numberBetween(1,2),
      'id_subasta' => $faker->numberBetween(1,6),
  ]);
  $factory('App\Evalusuarios', [
      'id_user_evaluador' => $faker->numberBetween(1,3),
      'id_user_evaluado' => $faker->numberBetween(4,5),
      'id_rating' => 1,
      'comentario' => $faker->paragraph,
  ]);
  $factory('App\Lineachat', [
      'text' => $faker->paragraph,
      'id_chat' => $faker->numberBetween(1,2),
      'id_usuario' => $faker->numberBetween(1,2),
  ]);
  $factory('App\Puja', [
      'cantidad' => $faker->numberBetween(1,999),
      'fecha' => $faker->dateTime(),
      'id_subasta' => $faker->numberBetween(1,3),
      'id_usuario' => $faker->numberBetween(1,3),
  ]);
  $factory('App\Confpujaauto', [
      'max_puja' => $faker->numberBetween(1,999),
      'incrementar' => $faker->numberBetween(1,100),
      'id_usuario' => $faker->numberBetween(1,3),
      'id_puja' => $faker->numberBetween(1,1),

  ]);

  $factory('App\Factura', [
    'fecha' => $faker->dateTime(),
    'precio' => $faker->numberBetween(1,999),
    'id_usuario' => $faker->numberBetween(1,3),
  ]);




//image($dir = '/tmp', $width = 640, $height = 480)
