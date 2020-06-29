<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('fecha_nacimiento')->nullable()->default(null);
            $table->string('sexo')->nullable()->default(null);
            $table->string('telefono')->nullable()->default(null);
            $table->string('direccion')->nullable()->default(null);
            $table->string('descripcion')->nullable()->default(null);
            $table->string('rol')->default('USR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfils');
    }
}
