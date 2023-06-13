<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentHours extends Model
{
    use HasFactory;

        protected $table = 'agent_hours_sysca';
        protected $fillable = ['id_usuario_registro',
            'tipo_fuente',
            'numero_empleado',
            'nombre_completo_agente',
            'agente_nombre',
            'agente_paterno',
            'agente_materno',
            'email_agente_fuente',
            'horas_sistema_agente',
            'horas_login_agente',
            'horas_logout_agente',
            'tiempo_conexion_agente',
            'procentaje_conexion_agente',
            'tiempo_descanso_agente',
            'tiempo_entrenamiento_agente',
            'tiempo_reuniones_agente',
            'id_campania',
            'day_register'];
}
