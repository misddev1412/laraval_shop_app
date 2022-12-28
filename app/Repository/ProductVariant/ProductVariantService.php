<?php

namespace App\Repository\ProductVariant;
use App\Repository\CrudInterface;

interface ProductVariantService extends CrudInterface
{
    public function show(mixed $id);
}
