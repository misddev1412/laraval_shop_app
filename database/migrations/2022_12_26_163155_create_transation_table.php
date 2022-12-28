<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->enum('from_user_type', ['USER', 'STORE'])->default('USER');
            $table->enum('to_user_type', ['USER', 'STORE'])->default('USER');
            $table->enum('status', ['PENDING', 'SUCCESS', 'FAILED', 'CANCELLED'])->default('PENDING');
            $table->string('third_party_transaction_id', 255)->nullable();
            $table->string('app_id', 255)->nullable();
            $table->double('amount', 20, 2)->default(0);
            $table->double('fee', 20, 2)->default(0);
            $table->double('total_amount', 20, 2)->default(0);
            $table->string('note', 255)->nullable();
            $table->enum('type', ['DEPOSIT', 'WITHDRAW', 'TRANSFER', 'REFUND', 'PAYMENT'])->default('DEPOSIT');
            $table->enum('payment_method', ['ZALOPAY', 'MOMO', 'VNPAY', 'CASH', 'CARD'])->default('CASH');
            $table->enum('payment_detail_method', ['ZALOPAY_QR', 'ZALOPAY_ATM', 'ZALOPAY_BANK_ACCOUNT', 'ZALOPAY_DEBIT_CARD', 'ZALOPAY_VISA_MASTERCARD_JCB', 'ZALOPAY_BANK', 'ZALOPAY_CARD', 'ZALOPAY_WALLET', 'MOMO_QR', 'MOMO_ATM', 'MOMO_BANK', 'MOMO_CARD', 'MOMO_WALLET', 'VNPAY_QR', 'VNPAY_ATM', 'VNPAY_BANK', 'VNPAY_CARD', 'VNPAY_WALLET', 'CASH', 'CARD'])->default('CASH');
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
        Schema::dropIfExists('transation');
    }
};
