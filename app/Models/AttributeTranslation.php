<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    use HasFactory;
    protected $table = 'attribute_translations';
    protected $fillable = [
        'attribute_id',
        'name',
        'locale',
        'description'
    ];
}
