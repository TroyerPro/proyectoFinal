<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatusuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_user1')->nullable();
            $table->foreign('id_user1')->references('id')->on('usuario');
            $table->unsignedInteger('id_user2')->nullable();
            $table->foreign('id_user2')->references('id')->on('usuario');
            $table->string('texto');
            $table->date('fecha')->nullable();
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
        Schema::drop('chat');
    }

}
