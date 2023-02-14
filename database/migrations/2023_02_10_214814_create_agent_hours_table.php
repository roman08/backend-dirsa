<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_hours', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario_registro');
            $table->integer('tipo_fuente');
            $table->integer('numero_empleado');
            $table->string('nombre_completo_agente');
            $table->string('agente_nombre');
            $table->string('agente_paterno');
            $table->string('agente_materno');
            $table->string('email_agente_fuente');
            $table->time('horas_sistema_agente');
            $table->time('horas_login_agente');
            $table->time('horas_logout_agente');
            $table->time('tiempo_conexion_agente');
            $table->float('procentaje_conexion_agente')->nullable();
            $table->time('tiempo_descanso_agente');
            $table->time('tiempo_entrenamiento_agente');
            $table->time('tiempo_reuniones_agente');
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
        Schema::dropIfExists('agent_hours');
    }
}
