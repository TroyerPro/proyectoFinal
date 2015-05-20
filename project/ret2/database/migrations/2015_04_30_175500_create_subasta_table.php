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
        Schema::create('subastas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_user_vendedor')->nullable();
            $table->foreign('id_user_vendedor')->references('id')->on('users');
            $table->unsignedInteger('id_factura')->nullable();
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->unsignedInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('metodo_pago');
            $table->string('metodo_envio');
            $table->boolean('estado_subasta')->default(true);
            $table->string('estado');
            $table->dateTime('fecha_final_antes_prorroga')->nullable();
            $table->integer('numero_prorrogas')->default(0);
            $table->dateTime('fecha_final');
            $table->dateTime('fecha_inicio');
            $table->decimal('precio_inicial', 10, 2);
            $table->decimal('precio_actual', 10, 2);
            $table->string('imagen');
            //$table->float('precio_compra')->nullable();
            $table->integer('puja_ganadora')->nullable();
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
        Schema::drop('subastas');
    }

}
