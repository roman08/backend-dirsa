<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaniaConfiguracionPorMes extends Model
{
    use HasFactory;
    
    protected $table = "campaigns_month_config_sysca";

    protected $fillable = ['id_campania','anio','id_mes','dias_habiles','numero_agentes','hrs_jornada','precio_hr','tipo_moneda','total_horas','total_costo','monto_fijo_mensual'];

    public function campania()
    {
        return $this->hasOne('App\Models\Campania', 'id', 'id_campania');
    }


    public function dias()
    {


        return $this->hasMany('App\Models\AgentHours', 'id_campania', 'id_campania')
        ->whereRaw('MONTH(day_register) = ?', [$this->id_mes]);
    }
}
