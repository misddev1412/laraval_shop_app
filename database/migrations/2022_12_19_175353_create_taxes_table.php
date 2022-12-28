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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->enum('type', ['PERCENTAGE', 'FIXED']);
            $table->double('amount');
            $table->enum('code', ['VAT', 'TAX']);
            $table->unsignedBigInteger('store_id');
            $table->unique(['store_id', 'code', 'type', 'amount']);
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
        Schema::dropIfExists('taxes');
    }
};
