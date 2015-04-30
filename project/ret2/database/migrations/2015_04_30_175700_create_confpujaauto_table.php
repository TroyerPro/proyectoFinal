<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfpujaautoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pujaauto', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->float('max_puja')->nullable();
			$table->float('incrementar')->nullable();
			$table->unsignedInteger('id_usuario')->nullable();
			$table->foreign('id_usuario')->references('id')->on('usuario');
			$table->unsignedInteger('id_puja')->nullable();
			$table->foreign('id_puja')->references('id')->on('puja');
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
		Schema::drop('pujaauto');
	}

}
