<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'tbl_income';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'community_id',
        'community_name',
        'avg_per_house',
        'income_1to6',
        'income_7to10',
        'income_11to15',
        'income_16to20',
        'income_21to25',
        'income_26to30',
        'income_30Up',
        'male',
        'female',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        
    ];

}
