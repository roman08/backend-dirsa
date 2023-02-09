<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','estatus'];



    public function agentes(){
        // return $this->hasMany(GrupoUsuario::class, 'id_grupo', 'id');
        return $this->hasMany('App\Models\GrupoUsuario', 'id_grupo', 'id');
    }
}
