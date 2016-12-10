<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('usuarios');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string("password", 64);
            $table->unsignedTinyInteger("tipo");
            $table->boolean("activo");
            $table->string('correo', 254);
            $table->unsignedInteger("personal_id");

            $table->foreign('personal_id')->references('id')->on('personal');
        });
    }
}
