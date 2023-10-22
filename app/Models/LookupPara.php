<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LookupPara extends Model
{
    use HasFactory;

    protected $table = 'lookup_para';

    protected $fillable = [
        
        'para_id',
        'para_name',
        'watershed_id',
        
    ];
}
