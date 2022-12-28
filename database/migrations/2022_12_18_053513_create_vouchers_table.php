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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'EXPIRED', 'DELETED'])->default('ACTIVE');
            $table->enum('type', ['PERCENTAGE', 'FIXED'])->default('PERCENTAGE');
            $table->decimal('value', 10, 2);
            $table->bigInteger('currency_id')->unsigned();
            $table->decimal('min_order_value', 10, 2);
            $table->decimal('max_discount_value', 10, 2);
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');
            $table->bigInteger('max_uses')->unsigned();
            $table->bigInteger('max_uses_per_user')->unsigned();
            $table->bigInteger('max_uses_per_order')->unsigned()->default(1);
            $table->bigInteger('redeemed')->unsigned()->default(0);
            $table->enum('apply_to', ['ALL_PRODUCTS', 'SELECTED_PRODUCTS', 'ALL_CATEGORIES', 'SELECTED_CATEGORIES'])->default('ALL_PRODUCTS');
            $table->enum('visibility', ['PUBLIC', 'PRIVATE'])->default('PRIVATE');
            $table->enum('applicable_to', ['ALL_USERS', 'SELECTED_USERS', 'ALL_CUSTOMERS', 'SELECTED_CUSTOMERS'])->default('ALL_USERS');
            $table->enum('scope', ['GLOBAL', 'STORE'])->default('GLOBAL');
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->enum('shipping_method', ['ALL_SHIPPING_METHODS', 'SELECTED_SHIPPING_METHODS'])->default('ALL_SHIPPING_METHODS');
            $table->enum('payment_method', ['ALL_PAYMENT_METHODS', 'SELECTED_PAYMENT_METHODS'])->default('ALL_PAYMENT_METHODS');
            $table->enum('usage_limit', ['UNLIMITED', 'LIMITED'])->default('LIMITED');
            $table->enum('usage_limit_per_user', ['UNLIMITED', 'LIMITED'])->default('LIMITED');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
};
