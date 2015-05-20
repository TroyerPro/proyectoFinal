<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvalusuarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalusuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_user_evaluador')->nullable();
            $table->foreign('id_user_evaluador')->references('id')->on('users');
            $table->unsignedInteger('id_user_evaluado')->nullable();
            $table->foreign('id_user_evaluado')->references('id')->on('users');
            $table->unsignedInteger('id_rating')->nullable();
            $table->foreign('id_rating')->references('id')->on('ratings');
            $table->unsignedInteger('id_subasta')->nullable();
            $table->foreign('id_subasta')->references('id')->on('subastas');
            $table->string('comentario');
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
        Schema::drop('evalusuarios');
    }

}
