<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaniaSupervisor extends Model
{
    use HasFactory;
    protected $table = 'campaigns_supervisor_sysca';
     protected $fillable = ['id_campania', 'id_supervisor'];
}
