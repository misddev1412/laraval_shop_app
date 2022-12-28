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
        Schema::create('attribute_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_id')->unsigned();
            $table->enum(
                'group', [
                    'GENERAL',
                    'SEO',
                    'ELECTRONIC',
                    'FASHION',
                    'FOOD',
                    'GROCERY',
                    'HEALTH',
                    'HOME',
                    'FURNITURE',
                    'SPORT',
                    'TOY',
                    'BOOK',
                    'MUSIC',
                    'VIDEO',
                    'SOFTWARE',
                    'GIFT',
                    'SERVICE'
                ]
            );
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
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
        Schema::dropIfExists('attribute_groups');
    }
};
