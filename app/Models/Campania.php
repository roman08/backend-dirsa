<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    use HasFactory;

    protected $table = 'campaigns_sysca';
    protected $fillable = ['nombre', 'estatus', 'fecha_creacion', 'bilingue', 'id_forma_de_pago', 'id_supervisor', 'id_grupo', 'id_type_origin'];

    public function leaders(){

        return $this->belongsToMany('App\Models\User', 'campaigns_supervisor_sysca', 'id_campania', 'id_supervisor');
    }

    public function groups(){
        return $this->belongsToMany('App\Models\Grupo', 'campaigns_group_agents_sysca', 'id_campania', 'id_grupo');
        // return $this->hasMany('App\Models\CampaniaGrupoAgentes', 'id_campania', 'id');
    }


    public function typePay(){
        return $this->hasOne('App\Models\TypePay', 'id', 'id_forma_de_pago');
    }

    public function months(){
        return $this->hasMany('App\Models\CampaniaConfiguracionPorMes', 'id_campania', 'id');
    }

}
