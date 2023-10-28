<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = 'tbl_population';

    protected $fillable = [
        
        'WatershedId',
        'ParaId',
        'CommunityId',
        'CommunityName',
        'MaleUnder5',
        'Male5to14',
        'Male15to19',
        'Male20to49',
        'Male50to65',
        'Male65Up',
        'FemaleUnder5',
        'Female5to14',
        'Female15to19',
        'Female20to49',
        'Female50to65',
        'Female65Up' ,
        'Totalmale',
        'TotalFemale',
        'TotalPopulation',
        'DisbaleMale',
        'DisabledFemale',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        
    ];
}
