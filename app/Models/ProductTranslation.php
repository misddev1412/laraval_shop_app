<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTranslation extends Model
{
    use HasFactory;
    protected $table = 'product_translations';
    protected $fillable = [
        'product_id',
        'locale',
        'name',
        'description',
        'short_description',
        'thumbnail_url',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_type',
        'og_image'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
