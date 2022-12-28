<?php

namespace App\Repository;
use Illuminate\Support\Facades\Http;
class PaymentImpl implements PaymentInterface
{
    public string $paymentGatewayUrl;
    public string $method;
    public function __construct(string $paymentGatewayUrl, $method = 'POST')
    {
        $this->paymentGatewayUrl = $paymentGatewayUrl;
        $this->method = $method;
    }

    public function generatePaymentUrl($data)
    {

        $httpClient = Http::withHeaders([
            'Accept' => 'application/json',
        ])->withBody(json_encode($data), 'application/json')->post($this->paymentGatewayUrl);

        return $httpClient->json();
    }

    public function verifyPayment($data)
    {
        // TODO: Implement verifyPayment() method.
    }

    public function callbackPayment($data)
    {
        // TODO: Implement callbackPayment() method.
    }
}
