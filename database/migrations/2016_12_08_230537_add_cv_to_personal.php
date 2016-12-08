<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCvToPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal', function (Blueprint $table) {
            $table->unsignedInteger('cv_id')->nullable();
            $table->foreign('cv_id')->references('id')->on('archivos')->onDelete('cascade');
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
            $table->dropForeign(['cv_id']);
            $table->dropColumn('cv_id');
        });
    }
}
