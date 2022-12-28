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
        Schema::create('shipping_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->string('api_key')->nullable();
            $table->string('api_secret')->nullable();
            $table->string('slug')->unique();
            $table->enum('type', ['SELF', 'THIRD_PARTY'])->default('SELF');
            $table->enum('zone', ['LOCAL', 'NATIONAL', 'INTERNATIONAL'])->default('NATIONAL');
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
        Schema::dropIfExists('shipping_units');
    }
};
