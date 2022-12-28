<?php

namespace App\Transformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseTransformer
{
    abstract public static function toResponse(Model $model): array;
    abstract public static function toResponseList(Collection $models): array;
    abstract public static function toModel(array $data): array;
}
