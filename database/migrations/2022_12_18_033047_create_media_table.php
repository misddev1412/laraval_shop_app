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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('original_url');
            $table->enum('type', ['IMAGE', 'VIDEO', 'AUDIO', 'DOCUMENT']);
            $table->bigInteger('size');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('user_id')->nullable();
            $table->string('small_url')->nullable();
            $table->string('medium_url')->nullable();
            $table->string('large_url')->nullable();
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
            $table->enum('visibility', ['PUBLIC', 'PRIVATE'])->default('PUBLIC');
            $table->enum('storage', ['LOCAL', 'S3', 'GCS'])->default('LOCAL');
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
        Schema::dropIfExists('media');
    }
};
