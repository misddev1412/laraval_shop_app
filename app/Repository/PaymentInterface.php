<?php

namespace App\Repository;

interface PaymentInterface
{
    public function generatePaymentUrl($data);
    public function verifyPayment($data);
    public function callbackPayment($data);
}
