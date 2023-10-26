<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $table = 'tbl_land';

    protected $fillable = [
        
        'watershed_id',
        'para_id',
        'community_id',
        'community_name',
        'landless',
        'self_owned',
        'community_land',
        'lease',
        'sharecropping',
        'occupation_land',
        'grove_land',
        'aquaculture',
        'valley',
        'plain_land',
        'hilly',
        'mixed',
        'profit_value',
        'profit_name',
        'created_by',
        'created_at',
        'update_by',
        'update_at',
        
    ];

}
