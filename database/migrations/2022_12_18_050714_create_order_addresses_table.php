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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('name');
            $table->string('email')->nullable();
            $table->bigInteger('phone_code_id')->unsigned();
            $table->string('phone_number')->nullable();
            $table->enum('type', ['BILLING', 'SHIPPING'])->default('SHIPPING');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->enum('tag', ['HOME', 'OFFICE', 'OTHER'])->default('HOME');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('admin_area_level_1_id')->unsigned();
            $table->bigInteger('admin_area_level_2_id')->unsigned();
            $table->string('street_address');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('full_address');
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
        Schema::dropIfExists('order_addresses');
    }
};
