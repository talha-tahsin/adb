<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitMaster extends Model
{
    use HasFactory;

    protected $table = 'tab_admit_master';

    protected $fillable = [
        'patient_id',
        'admit_date',
        'patient_name',
        'age',
        'weight',
        'gender',
        'blood_grp',
        'admit_cause',
        'cont_number',
        'address',
        'entry_by',
        'release_date',
        'delete_row',
    ];
}
