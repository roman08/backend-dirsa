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
            $table->integer('id_usuario_registro')->nullable();
            $table->integer('tipo_fuente')->nullable();
            $table->integer('numero_empleado')->nullable();
            $table->string('nombre_completo_agente')->nullable();
            $table->string('agente_nombre')->nullable();
            $table->string('agente_paterno')->nullable();
            $table->string('agente_materno')->nullable();
            $table->string('email_agente_fuente')->nullable();
            $table->time('horas_sistema_agente')->nullable();
            $table->time('horas_login_agente')->nullable();
            $table->time('horas_logout_agente')->nullable();
            $table->time('tiempo_conexion_agente')->nullable();
            $table->float('procentaje_conexion_agente')->nullable();
            $table->time('tiempo_descanso_agente')->nullable();
            $table->time('tiempo_entrenamiento_agente')->nullable();
            $table->time('tiempo_reuniones_agente')->nullable();
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
