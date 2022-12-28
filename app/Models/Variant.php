<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'user_id'];

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attributes()
    {
        return $this->hasMany(VariantAttribute::class);
    }

    public function translations()
    {
        return $this->hasMany(VariantTranslation::class);
    }

    public function currentTranslation()
    {
        return $this->hasOne(VariantTranslation::class, 'variant_id', 'id');
    }
}
