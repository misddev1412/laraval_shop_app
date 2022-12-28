<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'locale', 'variant_id', 'description'];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
