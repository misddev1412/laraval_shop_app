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
        Schema::create('freeship_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'EXPIRED', 'DELETED'])->default('ACTIVE');
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->bigInteger('shipping_method_id')->unsigned()->nullable();
            $table->bigInteger('shipping_unit_id')->unsigned()->nullable();
            $table->double('min_order_amount', 10, 2)->default(0);
            $table->double('max_order_amount', 10, 2)->default(0);
            $table->double('min_order_quantity', 10, 2)->default(0);
            $table->double('max_order_quantity', 10, 2)->default(0);
            $table->double('min_order_weight', 10, 2)->default(0);
            $table->double('max_order_weight', 10, 2)->default(0);
            $table->dateTime('valid_from')->nullable();
            $table->dateTime('valid_to')->nullable();
            $table->bigInteger('max_usage')->default(0);
            $table->bigInteger('max_usage_per_user')->default(0);
            $table->bigInteger('redeemed')->default(0);
            $table->enum('visibility', ['PUBLIC', 'PRIVATE'])->default('PRIVATE');
            $table->enum('applicable_to', ['ALL_USERS', 'SELECTED_USERS', 'ALL_CUSTOMERS', 'SELECTED_CUSTOMERS'])->default('ALL_USERS');
            $table->enum('scope', ['GLOBAL', 'STORE'])->default('GLOBAL');
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
        Schema::dropIfExists('freeship_vouchers');
    }
};
