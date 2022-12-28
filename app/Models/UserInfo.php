<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_infos';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'user_id',
        'phone_country_code',
        'gender',
        'avatar_url',
        'cover_url',
        'birthday',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
