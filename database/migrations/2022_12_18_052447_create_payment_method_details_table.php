<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_method_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_method_id')->unsigned();
            $table->string('api_key')->nullable();
            $table->string('api_secret')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->enum('type', ['SELF', 'THIRD_PARTY'])->default('SELF');
            $table->enum('method', [
                'MOMO',
                'ZALOPAY',
                'VNPAY',
                'VISA',
                'MASTER_CARD',
                'JCB',
                'AMERICAN_EXPRESS',
                'CASH_ON_DELIVERY',
                'SHOPEE_PAY',
                'TNG',
                'VCOIN',
                'VIETTEL_PAY',
                'APPLE_PAY',
                'GOOGLE_PAY',
                'SAMSUNG_PAY'
            ])->default('CASH_ON_DELIVERY');
            $table->bigInteger('store_id')->unsigned();
            $table->boolean('base_on_master')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_method_details');
    }
};
