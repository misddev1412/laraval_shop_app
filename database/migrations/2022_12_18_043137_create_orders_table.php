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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->enum('internal_status', ['PENDING', 'PROCESSING', 'DELIVERED', 'CANCELED', 'REFUNDED'])->default('PENDING');
            $table->enum('external_status', ['PENDING', 'PROCESSING', 'DELIVERED', 'CANCELED', 'REFUNDED'])->default('PENDING');
            $table->bigInteger('payment_id')->unsigned()->nullable();
            $table->double('total_original_amount', 20, 2)->default(0);
            $table->double('total_tax', 20, 2)->default(0);
            $table->double('total_shipping_cost', 20, 2)->default(0);
            $table->double('total_discount', 20, 2)->default(0);
            $table->double('total_due_amount', 20, 2)->default(0);
            $table->double('total_paid_amount', 20, 2)->default(0);
            $table->double('total_refunded_amount', 20, 2)->default(0);
            $table->double('total_canceled_amount', 20, 2)->default(0);
            $table->bigInteger('currency_id');
            $table->double('total_items', 5, 2)->default(0);
            $table->double('total_items_quantity', 5, 2)->default(0);
            $table->double('total_items_weight', 5, 2)->default(0);
            $table->enum('weight_unit', ['KG', 'LB'])->default('KG');
            $table->bigInteger('shipping_method_id')->unsigned()->nullable();
            $table->bigInteger('shipping_unit_id')->unsigned()->nullable();
            $table->string('note')->nullable();
            $table->string('shipping_tracking_number')->nullable();
            $table->enum('source', ['WEB', 'APP', 'OTHER'])->default('WEB');
            $table->enum('lead_source', ['DIRECT', 'FACEBOOK', 'GOOGLE', 'OTHER'])->default('DIRECT');
            $table->bigInteger('referral_id')->unsigned()->nullable();
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->bigInteger('total_voucher_redemptions')->default(0);
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
        Schema::dropIfExists('orders');
    }
};
