<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitDetails extends Model
{
    use HasFactory;

    protected $table = 'tab_admit_details';

    protected $fillable = [
        'patient_id',
        'admit_date',
        'admit_acc_code',
        'admited_by',
        'admit_type',
        'bed_cabin_type',
        'bed_cabin_no',
        'bed_cabin_charge',
        'entry_by',
    ];
}
