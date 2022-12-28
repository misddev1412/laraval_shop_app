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
        Schema::create('order_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('voucher_id')->unsigned()->nullable();
            $table->bigInteger('freeship_voucher_id')->unsigned()->nullable();
            $table->double('discount', 10, 2)->unsigned()->default(0);
            $table->bigInteger('currency_id')->unsigned()->nullable();
            $table->string('code')->nullable();
            $table->bigInteger('redeemed_by')->unsigned()->nullable();
            $table->enum('type', ['DISCOUNT', 'FREESHIP'])->default('DISCOUNT');
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
        Schema::dropIfExists('order_vouchers');
    }
};
