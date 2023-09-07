<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clarifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'file',
        'id_categorie',
        'days',
        'metadata',
        'observations'
    ];
}
