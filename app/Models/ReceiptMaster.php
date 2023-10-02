<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptMaster extends Model
{
    use HasFactory;

    protected $table = 'tab_receipt_master';

    protected $fillable = [
        'receipt_no',
        'receipt_date',
        'doctor_name',
        'patient_name',
        'patient_age',
        'gender',
        'blood_group',
        'cont_number',
        'address',
        'entry_by',
        'status',
    ];

}
