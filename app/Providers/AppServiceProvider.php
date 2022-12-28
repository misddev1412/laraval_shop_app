<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register Interface
        $this->app->bind(
            'App\Repository\Product\ProductService',
            'App\Repository\Product\ProductServiceImpl'
        );

        $this->app->bind(
            'App\Repository\ProductPrice\ProductPriceService',
            'App\Repository\ProductPrice\ProductPriceServiceImpl'
        );

        $this->app->bind(
            'App\Repository\Order\OrderService',
            'App\Repository\Order\OrderServiceImpl'
        );

        $this->app->bind(
            'App\Repository\OrderItem\OrderItemService',
            'App\Repository\OrderItem\OrderItemServiceImpl'
        );
        $this->app->bind(
            'App\Repository\ProductVariant\ProductVariantService',
            'App\Repository\ProductVariant\ProductVariantServiceImpl'
        );
        //Payment Register
        $this->app->bind(
            'App\Repository\PaymentInterface',
            'App\Repository\PaymentImpl'
        );
        $this->app->bind(
            'App\Repository\ZaloPay\ZaloPayService',
            'App\Repository\ZaloPay\ZaloPayServiceImpl'
        );
        $this->app->bind(
            'App\Repository\PaymentMethod\PaymentMethodService',
            'App\Repository\PaymentMethod\PaymentMethodServiceImpl'
        );
        $this->app->bind(
            'App\Repository\Payment\PaymentService',
            'App\Repository\Payment\PaymentServiceImpl'
        );
        $this->app->bind(
            'App\Repository\Transaction\TransactionService',
            'App\Repository\Transaction\TransactionServiceImpl'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
