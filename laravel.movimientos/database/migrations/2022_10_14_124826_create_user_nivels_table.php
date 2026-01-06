<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_nivels', function (Blueprint $table) {
            $table->id('pk_id_user_nivel');
            $table->integer('fkp_rol')->nullable()->default('0') ->comment('ROL AUTORIZAOD');
            $table->integer('fkp_regional')->nullable()->default('0')->comment('REGIONAL U OFICINA CENTRAL');
            $table->integer('fk_id_area')->nullable()->default('0')->comment('AREA AL QUE PERTENECE');
            $table->integer('logueado')->nullable()->default('0')->comment('ROL ACTIVO');
            $table->integer('fk_user')->nullable()->comment('USUARIO QUIEN REGISTRO O ACTUALIZO REGISTRO');
            $table->integer('activo')->nullable()->default('1');
            $table->timestamps();

            $table->integer('fk_id_user')->unsigned()->comment('RELACIONA CON LA TABLA USERS');
            $table->foreign('fk_id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_nivels');
    }
}
