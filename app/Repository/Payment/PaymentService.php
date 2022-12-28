<?php

namespace App\Repository\Payment;

use App\Repository\CrudInterface;

interface PaymentService extends CrudInterface
{
    public function buildData(int $paymentMethodId, $id);

    public function updatePaymentByCallBack($callBackData);
}
