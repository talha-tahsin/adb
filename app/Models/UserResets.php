<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResets extends Model
{
    use HasFactory;

    protected $table = 'user_resets';

    protected $fillable = [
        'plain_password',
        'user_mobile',
        'user_birth_date',
    ];

}
