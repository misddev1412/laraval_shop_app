<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const SUCCESS = 'SUCCESS';
    const FAILED = 'FAILED';
    const ENTRY_TYPE_DEBIT = 'DEBIT';
    const ENTRY_TYPE_CREDIT = 'CREDIT';
    protected $fillable = [
        'code',
        'payment_id',
        'from_user_id',
        'to_user_id',
        'from_user_type',
        'to_user_type',
        'status',
        'third_party_transaction_id',
        'app_id',
        'amount',
        'fee',
        'total_amount',
        'note',
        'type',
        'payment_method',
        'payment_detail_method',
        'entry_type',
    ];
}
