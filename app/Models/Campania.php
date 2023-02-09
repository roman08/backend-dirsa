<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'estatus', 'fecha_creacion', 'bilingue', 'id_forma_de_pago', 'id_supervisor', 'id_grupo'];

    public function leaders(){

        return $this->belongsToMany('App\Models\User', 'campania_supervisors', 'id_campania', 'id_supervisor');
        // return $this->hasMany('App\Models\CampaniaSupervisor', 'id_campania', 'id');

        


    }

    public function groups(){
        return $this->belongsToMany('App\Models\Grupo', 'campania_grupo_agentes', 'id_campania', 'id_grupo');
        // return $this->hasMany('App\Models\CampaniaGrupoAgentes', 'id_campania', 'id');
    }


    public function typePay(){
        return $this->hasOne('App\Models\TypePay', 'id', 'id_forma_de_pago');
    }

    public function months(){
        return $this->hasMany('App\Models\CampaniaConfiguracionPorMes', 'id_campania', 'id');
    }

}
