<?php

namespace App\Helper;

use Carbon\Carbon;

class OrderHelper
{
    public static function generateOrderNumber($storeId): string
    {
        return sprintf('%s%s%d', Carbon::now()->format('Ymd'), OrderHelper::formatStoreId($storeId), rand(1000, 9999));
    }

    private static function formatStoreId($storeId): string
    {
        return str_pad($storeId, 5, '0', STR_PAD_LEFT);
    }

}
