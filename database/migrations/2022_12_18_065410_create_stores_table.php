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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_address');
            $table->string('username')->unique();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->bigInteger('phone_code_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('admin_area_level_1_id')->unsigned()->nullable();
            $table->bigInteger('admin_area_level_2_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('owner_id')->unsigned();
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->enum('scale', ['SMALL', 'MEDIUM', 'LARGE'])->default('SMALL');
            $table->enum('visibility', ['PUBLIC', 'PRIVATE'])->default('PUBLIC');
            $table->bigInteger('parent_id')->unsigned()->nullable();
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
        Schema::dropIfExists('stores');
    }
};
