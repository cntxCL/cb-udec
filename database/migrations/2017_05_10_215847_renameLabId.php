<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameLabId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign(['lab_id']);
            $table->renameColumn('lab_id', 'laboratorio_id');
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
       Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign(['laboratorio_id']);
            $table->renameColumn('laboratorio_id', 'lab_id');
            $table->foreign('lab_id')->references('id')->on('laboratorios');
        });
    }
}
