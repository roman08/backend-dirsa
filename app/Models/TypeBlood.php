<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeBlood extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'id_estatus'];
}
