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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('country');
            $table->string('item_type');
            $table->string('sales');
            $table->string('priority');
            $table->string('date');
            $table->string('order_id');
            $table->string('ship_date');
            $table->string('unit_sold');
            $table->string('unit_price');
            $table->string('unit_cost');
            $table->string('total_revenue');
            $table->string('total_cost');
            $table->string('total_profit');
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
        Schema::dropIfExists('tests');
    }
};
