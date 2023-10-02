<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthStatus extends Model
{
    use HasFactory;

    protected $table = 'tab_health_status';

    protected $fillable = [
        'patient_id',
        'admit_date',
        'health_condition',
        'health_condt_descrip',
        'allergies',
        'allergies_descrip',
        'surgery',
        'surgery_descrip',
        'entry_by',
    ];
}
