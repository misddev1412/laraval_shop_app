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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('user_id');
            $table->double('rating')->default(0);
            $table->bigInteger('views')->default(0);
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED', 'DELETED', 'ARCHIVED', 'DRAFT'])->default('PENDING');
            $table->enum('visibility', ['PUBLIC', 'PRIVATE'])->default('PUBLIC');
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
        Schema::dropIfExists('products');
    }
};
