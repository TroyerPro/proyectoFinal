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
		Schema::create('pujaautos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->float('max_puja')->nullable();
			$table->float('incrementar')->nullable();
			$table->unsignedInteger('id_usuario')->nullable();
			$table->foreign('id_usuario')->references('id')->on('users');
			$table->unsignedInteger('id_puja')->nullable();
			$table->foreign('id_puja')->references('id')->on('pujas');
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
		Schema::drop('pujaautos');
	}

}
