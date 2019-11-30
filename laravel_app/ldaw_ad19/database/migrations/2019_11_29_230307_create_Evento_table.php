<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evento', function (Blueprint $table) {
            $table->integer('id');
            $table->string('titulo_evento');
            $table->string('descripcion');
            $table->string('fecha');
            $table->string('hora');
            $table->string('sitio');
            $table->string('ciudad');
            $table->integer('telefono');
            $table->integer('capacidad_maxima');
            $table->integer('afluencia_actual');
            $table->integer('costo');
            $table->integer('visible');
            $table->integer('id_estado');
            $table->integer('id_institucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Evento');
    }
}
