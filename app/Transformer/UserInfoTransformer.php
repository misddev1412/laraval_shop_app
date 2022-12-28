<?php

namespace App\Transformer;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserInfoTransformer extends BaseTransformer
{
    public static function toResponse(UserInfo|Model $userInfo): array
    {
        return [
            'id' => $userInfo->id,
            'first_name' => $userInfo->first_name,
            'last_name' => $userInfo->last_name,
            'full_name' => $userInfo->full_name,
            'phone_number' => $userInfo->phone_number,
            'phone_country_code' => $userInfo->phone_country_code,
            'avatar_url' => $userInfo->avatar_url,
            'cover_url' => $userInfo->cover_url,
            'gender' => $userInfo->gender,
            'birthday' => $userInfo->birthday
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
