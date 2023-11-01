<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literacy extends Model
{
    use HasFactory;

    protected $table = 'tbl_literacy';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'para_name',
        'male_read_write',
        'female_read_write',
        'male_primary',
        'male_ssc',
        'female_ssc',
        'male_hsc',
        'female_hsc',
        'male_graduation',
        'female_graduation',
        'male_post',
        'female_post',
        'male_total',
        'female_total',
        'income_training',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        
    ];

}
