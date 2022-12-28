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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->string('slug')->unique();
            $table->enum('type', ['SELF', 'THIRD_PARTY'])->default('SELF');
            $table->enum('method', ['CASH', 'DEBIT_CARD', 'BANK_TRANSFER', 'CREDIT_CARD', 'CASH_ON_DELIVERY', 'E-WALLET'])->default('CASH');
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
        Schema::dropIfExists('payment_methods');
    }
};
