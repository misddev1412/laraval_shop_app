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
        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('price', 'unit_price');
            $table->double('total_price')->default(0)->after('quantity');
            $table->double('total_tax')->default(0)->after('total_price');
            $table->double('total_discount')->default(0)->after('total_tax');
            $table->double('total_due_amount')->default(0)->after('total_discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('unit_price', 'price');
            $table->dropColumn('total_price');
            $table->dropColumn('total_tax');
            $table->dropColumn('total_discount');
            $table->dropColumn('total_due_amount');
        });
    }
};
