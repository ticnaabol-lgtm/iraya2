<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->comment('NOMBRE DEL USUARIO');
            $table->string('email')->unique()->comment('EMAIL DEL USUARIO');
            $table->integer('nivel')->nullable()->comment('NIVEL DEL USUARIO');
            $table->integer('activo')->default(1)->comment('VIGENTE');
            $table->integer('fk_user')->nullable()->comment('USUARIO QUIEN REGISTRO O REALIZO ACTUALIZACION');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('CONTRASEÑA DEL USUARIO');
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
        Schema::dropIfExists('users');
    }
}
