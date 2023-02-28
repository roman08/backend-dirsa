<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObtHoursCampaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obt_hours_campanias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_campania');
            $table->string('nombre');
            $table->string('estatus');
            $table->date('fecha_creacion');
            $table->time('hrs_campania');
            $table->integer('id_grupo');

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
        Schema::dropIfExists('obt_hours_campanias');
    }
}
