<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clarifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'cut_date',
        'date',
        'employee_number',
        'file',
        'hours',
        'id_categorie',
        'id_user',
        'name',
        'observations',
    ];
}
