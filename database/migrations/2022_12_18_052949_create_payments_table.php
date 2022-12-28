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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('payment_method_id')->unsigned();
            $table->bigInteger('payment_method_detail_id')->unsigned()->nullable();
            $table->double('total_refunded_amount', 20, 2)->default(0);
            $table->double('total_canceled_amount', 20, 2)->default(0);
            $table->double('total_tax', 20, 2)->default(0);
            $table->double('total_shipping_cost', 20, 2)->default(0);
            $table->double('total_discount', 20, 2)->default(0);
            $table->double('total_original_amount', 20, 2)->default(0);
            $table->double('total_paid_amount', 20, 2)->default(0);
            $table->double('total_due_amount', 20, 2)->default(0);
            $table->enum('status', ['PENDING', 'PROCESSING', 'PAID', 'REFUNDED', 'CANCELED'])->default('PENDING');
            $table->string('counter_code')->nullable();
            $table->string('note')->nullable();
            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->bigInteger('currency_id');
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
        Schema::dropIfExists('payments');
    }
};
