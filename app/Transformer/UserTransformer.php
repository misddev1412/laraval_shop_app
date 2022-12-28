<?php

namespace App\Transformer;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserTransformer extends BaseTransformer
{
    public static function toResponse(User|Model $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'user_info' => UserInfoTransformer::toResponse($user->info),
            'products' => ProductTransformer::toResponseList($user->products),
        ];
    }

    public static function toModel(array $data): array
    {
        return [];
    }

    public static function toResponseList(Collection $models): array
    {
        $result = [];
        foreach ($models as $model) {
            $result[] = self::toResponse($model);
        }
        return $result;
    }
}
