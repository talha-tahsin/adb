<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'tab_doctors';

    protected $fillable = [
        'doctor_name',
        'title',
        'specialist_in',
        'designation',
        'hospital',
        'doctor_type',
        'other_quality',
    ];

}
