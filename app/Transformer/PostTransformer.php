<?php

namespace App\Transformer;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostTransformer extends BaseTransformer
{
    public static function toResponse(Post|Model $post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'translations' => PostTranslationTransformer::toResponseList($post->translations),
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }

    public static function toResponseList(Collection $posts): array
    {
        $result = [];
        foreach ($posts as $post) {
            $result[] = self::toResponse($post);
        }
        return $result;
    }

    public static function toModel(array $data): array
    {
        $acceptedFields = [
            'title',
            'content',
            'translations',
        ];

        return array_intersect_key($data, array_flip($acceptedFields));
    }
}
