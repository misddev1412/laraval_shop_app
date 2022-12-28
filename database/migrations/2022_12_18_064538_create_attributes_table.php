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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('scope', ['PRODUCT', 'VARIANT', 'GLOBAL'])->default('PRODUCT');
            $table->enum('type', ['TEXT', 'NUMBER', 'BOOLEAN', 'SELECT', 'MULTISELECT', 'DATE', 'DATETIME', 'TIME', 'FILE', 'IMAGE', 'HTML', 'JSON', 'URL', 'EMAIL', 'PHONE', 'CURRENCY', 'PASSWORD', 'COLOR', 'SIZE'])->default('TEXT');
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
        Schema::dropIfExists('attributes');
    }
};
