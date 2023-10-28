<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $table = 'tbl_expenses';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'community_id',
        'community_name',
        'avg_per_house',
        'expenses_1to6',
        'expenses_7to10',
        'expenses_11to15',
        'expenses_16to20',
        'expenses_21to25',
        'expenses_26to30',
        'expenses_30Up',
        'male',
        'female',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        
    ];

}
