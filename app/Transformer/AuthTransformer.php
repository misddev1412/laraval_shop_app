<?php

namespace App\Transformer;

use App\Models\PostTranslation;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AuthTransformer extends BaseTransformer
{
    public static function toResponse(User|Model $user): array
    {
        return [
            'token' => $user->token,
            'expired_at' => $user->expiredAt
        ];
    }

    public static function toModel(array $data): array
    {
        return [];
    }

    public static function toResponseList(Collection $models): array
    {
        return [];
    }
}
