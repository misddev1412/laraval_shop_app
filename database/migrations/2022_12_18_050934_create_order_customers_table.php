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
        Schema::create('order_customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone_code_id')->unsigned()->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('type', ['GUEST', 'REGISTERED'])->default('GUEST');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->enum('source', ['WEB', 'APP', 'OTHER'])->default('WEB');
            $table->ipAddress('ip_address')->nullable();
            $table->enum('lead_source', ['DIRECT', 'FACEBOOK', 'GOOGLE', 'OTHER'])->default('DIRECT');
            $table->enum('loyalty', ['GOLD', 'SILVER', 'BRONZE'])->default('BRONZE');
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
        Schema::dropIfExists('order_customers');
    }
};
