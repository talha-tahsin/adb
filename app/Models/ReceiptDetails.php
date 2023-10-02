<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptDetails extends Model
{
    use HasFactory;

    protected $table = 'tab_receipt_details';

    protected $fillable = [
        'receipt_no',
        'receipt_date',
        'test_code',
        'test_name',
        'amount',
    ];

}
