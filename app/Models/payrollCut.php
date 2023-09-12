<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payrollCut extends Model
{
    use HasFactory;
    protected $fillable = [
        "yaer",
        "month",
        "pay_day",
        "start_day",
        "end_day",
        "dispersion_day",
        "court",
        "user_id"
    ];
}
