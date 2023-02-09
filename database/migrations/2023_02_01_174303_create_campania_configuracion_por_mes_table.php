<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaniaConfiguracionPorMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campania_configuracion_por_mes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_campania');
            $table->string('anio');
            $table->integer('id_mes');
            $table->integer('dias_habiles');
            $table->integer('numero_agentes');
            $table->integer('hrs_jornada');
            $table->float('precio_hr');
            $table->string('tipo_moneda');
            $table->integer('total_horas');
            $table->integer('total_costo');
            $table->float('monto_fijo_mensual');
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
        Schema::dropIfExists('campania_configuracion_por_mes');
    }
}
