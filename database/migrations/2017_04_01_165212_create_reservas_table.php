<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->boolean('aceptado');
            $table->timestamps();

            $table->unsignedInteger('motivo_id');
            $table->unsignedInteger('sala_id');
            $table->unsignedInteger('personal_id');

            $table->foreign('motivo_id')->references('id')->on('motivo');
            $table->foreign('sala_id')->references('id')->on('salas');
            $table->foreign('personal_id')->references('id')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
