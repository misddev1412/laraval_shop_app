<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::firstOrCreate(
            [
                'name' => 'Cash on Delivery',
                'description' => 'Pay with cash on delivery',
                'status' => 'ACTIVE',
                'slug' => 'cash-on-delivery',
                'type' => 'SELF',
                'method' => 'CASH_ON_DELIVERY',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Paypal',
                'description' => 'Pay with paypal',
                'status' => 'ACTIVE',
                'slug' => 'paypal',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Stripe',
                'description' => 'Pay with stripe',
                'status' => 'ACTIVE',
                'slug' => 'stripe',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Bank Transfer',
                'description' => 'Pay with bank transfer',
                'status' => 'ACTIVE',
                'slug' => 'bank-transfer',
                'type' => 'SELF',
                'method' => 'BANK_TRANSFER',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Paystack',
                'description' => 'Pay with paystack',
                'status' => 'ACTIVE',
                'slug' => 'paystack',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Flutterwave',
                'description' => 'Pay with flutterwave',
                'status' => 'ACTIVE',
                'slug' => 'flutterwave',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'ZaloPay',
                'description' => 'Pay with zalo pay',
                'status' => 'ACTIVE',
                'slug' => 'zalopay',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'Momo',
                'description' => 'Pay with momo',
                'status' => 'ACTIVE',
                'slug' => 'momo',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );

        PaymentMethod::firstOrCreate(
            [
                'name' => 'VNPAY',
                'description' => 'Pay with vn pay',
                'status' => 'ACTIVE',
                'slug' => 'vn-pay',
                'type' => 'THIRD_PARTY',
                'method' => 'E-WALLET',
            ]
        );
    }
}
