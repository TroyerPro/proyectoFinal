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
        Schema::create('evalusuario', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_userevaluador')->nullable();
            $table->foreign('id_userevaluador')->references('id')->on('usuario');
            $table->unsignedInteger('id_userevaluado')->nullable();
            $table->foreign('id_userevaluado')->references('id')->on('usuario');
            $table->string('comentario');
            $table->integer('rating');
            $table->date('fecha');
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
        Schema::drop('evalusuario');
    }

}
