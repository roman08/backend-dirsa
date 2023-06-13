<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = "groups_sysca";
    protected $fillable = ['nombre','estatus', 'id_tipo_agente'];



    public function agentes2(){
        // return $this->hasMany(GrupoUsuario::class, 'id_grupo', 'id');
        return $this->hasMany('App\Models\GrupoUsuario', 'id_grupo', 'id');
    }


    public function agentes()
    {

        return $this->belongsToMany('App\Models\User', 'groups_users_sysca', 'id_grupo', 'id_usuario');
    }
}
