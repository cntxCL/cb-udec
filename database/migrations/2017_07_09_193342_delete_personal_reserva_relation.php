<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePersonalReservaRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign(['personal_id']);
            $table->dropColumn('personal_id');

            $table->string('responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn('responsable');

            $table->unsignedInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('personal');
        });
    }
}
