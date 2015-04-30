<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('username')->unique(); // used for slug.
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->float('ratingcomprador')->nullable();
            $table->float('ratingvendedor')->nullable();
            $table->boolean('admin')->default(false);
            $table->unsignedInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresa');
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
        Schema::drop('usuario');
    }

}
