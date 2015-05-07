<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('direccion')->nullable();
			$table->float('precio_prorroga');
			$table->integer('dias_subasta_gratis');
			$table->integer('tiempo_inactividad');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}

}
