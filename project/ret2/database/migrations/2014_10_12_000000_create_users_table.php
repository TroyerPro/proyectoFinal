<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique(); // used for slug.
            $table->string('nif');
            $table->dateTime('fecha_nacimiento');
            $table->string('ciudad');
            $table->string('descripcion');
            $table->string('imagen');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(false);
            $table->boolean('admin')->default(false);
            $table->float('ratingcomprador')->nullable();
            $table->float('ratingvendedor')->nullable();
            $table->unsignedInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
