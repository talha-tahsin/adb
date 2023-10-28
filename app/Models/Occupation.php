<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    protected $table = 'tbl_occupation';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'community_id',
        'community_name',
        'jhum',
        'plain_land',
        'orchard',
        'fuel_wood',
        'wage_labour',
        'poultry',
        'livestock',
        'aquaculture',
        'service_holder',
        'business',
        'handicraft',
        'others',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        
    ];
}
