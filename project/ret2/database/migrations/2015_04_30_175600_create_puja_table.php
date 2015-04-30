<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePujaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puja', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('cantidad');
            $table->date('fecha');
            $table->unsignedInteger('id_subasta')->nullable();
            $table->foreign('id_subasta')->references('id')->on('subasta');
            $table->unsignedInteger('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuario');
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
        Schema::drop('puja');
    }

}
