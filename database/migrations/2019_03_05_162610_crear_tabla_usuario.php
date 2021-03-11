<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->tinyInteger('activo')->default(1);
            //$table->dateTime('last_ip', 50);
            //$table->dateTime('last_login', 50);
            //$table->string('tipo_user', 50); //personal, clientes...
            $table->timestamps();
            //$table->softDeletes();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
