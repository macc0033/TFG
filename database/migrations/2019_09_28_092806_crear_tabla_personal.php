<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellidos', 100);
            $table->string('dni', 20);
            $table->string('subir_dni', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('email_empresa', 100)->nullable();
            //Tabla Direcciones¿?
            $table->string('direccion', 200)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->integer('localidad')->nullable();
            $table->integer('provincia')->nullable();
            $table->integer('pais')->nullable();
            
            $table->unsignedInteger('usuario_id')->nullable();
            $table->foreign('usuario_id', 'fk_usuariopersonal_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('personal');
    }
}
