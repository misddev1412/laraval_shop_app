<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    const METHOD_ZALOPAY = 'zalopay';
    protected $fillable = [
        'name',
        'description',
        'status',
        'slug',
        'type',
        'method',
    ];
}
