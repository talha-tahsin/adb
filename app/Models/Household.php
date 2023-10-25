<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $table = 'tbl_household';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'community_id',
        'community_name',
        'jhupri_house',
        'kacha_house',
        'semi_pacca_house',
        'pacca_house',
        'total_house',
        'created_by',
        
    ];
}
