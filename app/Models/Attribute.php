<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = [
        'code',
        'scope',
        'type'
    ];

    public function attributeTranslations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    public function attributeGroups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AttributeGroup::class);
    }

    public function currentTranslation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AttributeTranslation::class);
    }

}
