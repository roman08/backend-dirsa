<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    use HasFactory;
    protected $table = 'groups_users_sysca';
     protected $fillable = ['id_usuario','id_grupo','fecha_ingreso','fecha_salida'];
}
