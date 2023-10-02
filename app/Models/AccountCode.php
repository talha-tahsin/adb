<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCode extends Model
{
    use HasFactory;

    protected $table = 'tab_acc_codes';

    protected $fillable = [
        'acc_code',
        'acc_name_en',
        'acc_name_bn',
        'acc_parent_code',
        'acc_head_type',
        'acc_code_type',
        'delete_row',
        'created_by',
    ];

}
