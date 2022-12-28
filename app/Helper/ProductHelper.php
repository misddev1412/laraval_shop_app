<?php

namespace App\Helper;

class ProductHelper
{
    public static function generateSku(): string
    {
        return 'SKU-' . time();
    }
}
