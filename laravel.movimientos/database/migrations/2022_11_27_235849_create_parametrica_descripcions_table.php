<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametricaDescripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrica_descripcions', function (Blueprint $table) {
            $table->id('pk_id_parametrica_descripcion')->comment('CLAVE PRIMARIA DE LA DESCRIPCION DE LA PARAMETRICA');
            $table->text('descripcion')->nullable()->comment('DESCRIPCION DE LA PARAMETRICA ESPECIFICA');
            $table->string('sigla')->nullable()->comment('SIGLA DE LA DESCRIPCION');
            $table->integer('nivel')->nullable()->default(0)->comment('NIVEL DEL USUARIO');
            $table->integer('activo')->default(1)->comment('ESTADO DE CAMPO');
            $table->integer('fk_user')->nullable()->comment('USUARIO QUE REGISTRA LA PARAMETRICA');
            $table->timestamps();

            $table->integer('fk_id_parametrica')->unsigned()->comment('RELACION CON LA TABLA PARAMETRICA');
            $table->foreign('fk_id_parametrica')->references('pk_id_parametrica')->on('parametricas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametrica_descripcions');
    }
}
