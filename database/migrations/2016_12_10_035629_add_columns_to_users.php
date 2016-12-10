<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->unsignedTinyInteger("tipo");
            $table->boolean("activo");
            $table->string('password', 64)->change();
            $table->string('email', 254)->change();
            $table->unsignedInteger("personal_id");
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn("tipo");
            $table->dropColumn("activo");
            $table->dropForeign(["personal_id"]);
            $table->dropColumn("personal_id");
        });
    }
}
