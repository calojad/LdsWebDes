<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_permiso', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permiso_id')->references('id')->on('permiso')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('perfil', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('user_organizacion', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('organizacion_id')->references('id')->on('organizacion')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('miembro_organizacion', function (Blueprint $table) {
            $table->foreign('miembro_id')->references('id')->on('miembro')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('organizacion_id')->references('id')->on('organizacion')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('miembro_llamamiento', function (Blueprint $table) {
            $table->foreign('miembro_id')->references('id')->on('miembro')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('llamamiento_id')->references('id')->on('llamamiento')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('asistencia', function (Blueprint $table) {
            $table->foreign('organizacion_id')->references('id')->on('organizacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('miembro_id')->references('id')->on('miembro')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_permiso', function (Blueprint $table) {
            $table->dropForeign('user_permiso_user_id_foreign');
            $table->dropForeign('user_permiso_permiso_id_foreign');
        });
        Schema::table('perfil', function (Blueprint $table) {
            $table->dropForeign('perfil_user_id_foreign');
        });
        Schema::table('user_organizacion', function (Blueprint $table) {
            $table->dropForeign('user_organizacion_user_id_foreign');
            $table->dropForeign('user_organizacion_organizacion_id_foreign');
        });
        Schema::table('miembro_organizacion', function (Blueprint $table) {
            $table->dropForeign('miembro_organizacion_miembro_id_foreign');
            $table->dropForeign('miembro_organizacion_organizacion_id_foreign');
        });
        Schema::table('miembro_llamamiento', function (Blueprint $table) {
            $table->dropForeign('miembro_llamamiento_miembro_id_foreign');
            $table->dropForeign('miembro_llamamiento_llamamiento_id_foreign');
        });
        Schema::table('asistencia', function (Blueprint $table) {
            $table->dropForeign('asistencia_organizacion_id_foreign');
            $table->dropForeign('asistencia_miembro_id_foreign');
        });
    }
}
