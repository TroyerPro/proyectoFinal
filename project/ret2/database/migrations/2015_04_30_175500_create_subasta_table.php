<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubastaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subasta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_user_vendedor')->nullable();
            $table->foreign('id_user_vendedor')->references('id')->on('usuario');
            $table->unsignedInteger('id_factura')->nullable();
            $table->foreign('id_factura')->references('id')->on('factura');
            $table->unsignedInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_final');
            $table->date('fecha_inicio');
            $table->float('precio_inicial');
            $table->float('precio_actual');
            $table->float('precio_compra');
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
        Schema::drop('subasta');
    }

}
