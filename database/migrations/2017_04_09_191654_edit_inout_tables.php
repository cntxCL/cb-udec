<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditInoutTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->datetime('fecha')->change();
        });

        Schema::table('salidas', function (Blueprint $table) {
            $table->datetime('fecha')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->date('fecha')->change();
        });

        Schema::table('salidas', function (Blueprint $table) {
            $table->date('fecha')->change();
        });
    }
}
