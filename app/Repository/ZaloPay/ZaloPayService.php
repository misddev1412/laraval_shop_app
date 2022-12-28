<?php

namespace App\Repository\ZaloPay;

use App\Repository\PaymentInterface;
use Illuminate\Http\Request;

interface ZaloPayService extends PaymentInterface
{
    public function buildCreateOrderData($data);

    public function callback(Request $request);
}
