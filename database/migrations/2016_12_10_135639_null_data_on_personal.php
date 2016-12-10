<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullDataOnPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal', function (Blueprint $table) {
            $table->unsignedInteger('correo')->nullable()->change();
            $table->unsignedInteger('telefono')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal', function (Blueprint $table) {
            $table->unsignedInteger('correo')->nullable(false)->change();
            $table->unsignedInteger('telefono')->nullable(false)->change();
        });
    }
}
