<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametricas', function (Blueprint $table) {
            $table->id('pk_id_parametrica')->comment('CLAVE PRIMARIA DE LA PARAMETRICA');
            $table->text('descripcion')->nullable()->comment('DESCRIPCION DE LA PARAMETRICA');
            $table->integer('activo')->default(1)->comment('ESTADO DE CAMPO');
            $table->integer('fk_user')->nullable()->comment('USUARIO QUE REGISTRA LA PARAMETRICA');
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
        Schema::dropIfExists('parametricas');
    }
}
