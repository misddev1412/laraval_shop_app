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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('device_id');
            $table->string('device_token');
            $table->string('device_name');
            $table->string('device_model')->nullable();
            $table->enum('type', ['ANDROID', 'IOS', 'WEB'])->default('WEB');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->boolean('is_logged_in')->default(false);
            $table->boolean('is_main')->default(false);
            $table->enum('user_type', ['GUEST', 'STORE', 'USER'])->default('GUEST');
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
        Schema::dropIfExists('devices');
    }
};
