<?php

namespace App\Repository\ZaloPay;

use App\Enumeration\StatusCode;
use App\Enumeration\ZaloPayDetailMethod;
use App\Exceptions\GlobalException;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Repository\PaymentImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ZaloPayServiceImpl extends PaymentImpl implements ZaloPayService
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */

    public function __construct($storeId = null)
    {
        if ($storeId) {
            $this->paymentGatewayUrl = config('payment.zalopay.url') . '/v2/create';
            $this->method = config('payment.zalopay.method');
        } else {
            $this->paymentGatewayUrl = config('payment.zalopay.url') . '/v2/create';
            $this->method = config('payment.zalopay.method');
        }

        parent::__construct($this->paymentGatewayUrl, $this->method);
    }

    public function buildCreateOrderData($data)
    {
        $config = [
            'appid' => config('payment.zalopay.appid'),
            'key1' => config('payment.zalopay.key1'),
            'key2' => config('payment.zalopay.key2')
        ];

        $embedData = [
            'redirecturl' => 'https://www.google.com',
            'payment_id' => $data['payment_id'],
            'from_user_id' => $data['from_user_id'],
            'to_user_id' => $data['to_user_id'],
            'from_user_type' => $data['from_user_type'],
            'to_user_type' => $data['to_user_type'],
            'payment_method' => Str::upper(PaymentMethod::METHOD_ZALOPAY),
            'type' => $data['transaction_type'],
            'note' => $data['note'],
            'entry_type' => Transaction::ENTRY_TYPE_CREDIT
        ];

        $items = [];

        $order = [
            'app_id' => (int) $config['appid'],
            'app_time' => round(microtime(true) * 1000),
            'app_trans_id' => date("ymd")."_".$data['code'],
            'app_user' => 'demo',
            'item' => json_encode($items, JSON_UNESCAPED_UNICODE),
            'embed_data' => json_encode($embedData, JSON_UNESCAPED_UNICODE),
            'amount' => $data['total_due_amount'],
            'description' => __('order.payment_description') . $data['code'],
            'bank_code' => 'zalopayapp',
//            'callback_url' => route('payment.zalopay.callback'),
            'callback_url' => 'https://9333-116-109-22-10.ap.ngrok.io/api/v1/payment/callback?merchant=ZALOPAY',
        ];

        $arrayHmac = [
            'app_id' => $order['app_id'],
            'app_trans_id' => $order['app_trans_id'],
            'app_user' => $order['app_user'],
            'amount' => $order['amount'],
            'app_time' => $order['app_time'],
            'embed_data' => $order['embed_data'],
            'item' => $order['item']
        ];

        $hmac = hash_hmac('sha256', implode('|', $arrayHmac), $config['key1']);

        $order['mac'] = $hmac;

        return $order;
    }

    /**
     * @throws GlobalException
     */
    public function callback(Request $request)
    {
        //Write log
        $logger = new Logger('zalopay');
        $logger->pushHandler(new StreamHandler(storage_path('logs/zalopay.log'), Logger::INFO));

        $key2 = config('payment.zalopay.key2');
        $postDataJson = $request->only('data', 'mac', 'type');
        $mac = hash_hmac('sha256', $postDataJson['data'], $key2);
        if (strcmp($mac, $postDataJson['mac']) !== 0) {
            $logger->info('ZaloPay callback: MAC is not valid');
            throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.payment_callback_error'), StatusCode::PAYMENT_MAC_NOT_VALID);
        } else {
            $data = json_decode($postDataJson['data'], true);
            $logger->info('ZaloPay callback', $postDataJson);
            return [
                'order_code' => explode('_', $data['app_trans_id'])[1] ?? null,
                'transaction_id' => $data['zp_trans_id'],
                'app_id' => $data['app_id'],
                'amount' => $data['amount'],
                'payment_detail_method' => ZaloPayDetailMethod::from($data['channel'])->name,
                'embed_data' => json_decode($data['embed_data'], true),
            ];
        }
    }
}
