<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaniaGrupoAgentes extends Model
{
    use HasFactory;
    protected $table = "campaigns_group_agents_sysca";
    protected $fillable = ['id_campania', 'id_grupo'];
    
}
