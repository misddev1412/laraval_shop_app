<?php

namespace App\Transformer;

use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostTranslationTransformer extends BaseTransformer
{
    public static function toResponseList(Collection $collection): array
    {
        $result = [];
        foreach ($collection as $item) {
            $result[] = self::toResponse($item);
        }
        return $result;
    }

    public static function toResponse(PostTranslation|Model $postTranslation): array
    {
        return [
            'id' => $postTranslation->id,
            'post_id' => $postTranslation->post_id,
            'locale' => $postTranslation->locale,
            'title' => $postTranslation->title,
            'content' => $postTranslation->content,
            'short_description' => $postTranslation->short_description,
            'thumbnail_url' => $postTranslation->thumbnail_url,
            'slug' => $postTranslation->slug,
            'meta_title' => $postTranslation->meta_title,
            'meta_description' => $postTranslation->meta_description,
            'meta_keywords' => $postTranslation->meta_keywords,
            'og_title' => $postTranslation->og_title,
            'og_description' => $postTranslation->og_description,
            'og_type' => $postTranslation->og_type,
            'og_image' => $postTranslation->og_image,
            'created_at' => $postTranslation->created_at,
            'updated_at' => $postTranslation->updated_at,
        ];
    }

    public static function toModel(array $data): array
    {
        // TODO: Implement toModel() method.
    }
}
