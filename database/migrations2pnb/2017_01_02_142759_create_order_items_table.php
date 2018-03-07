<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->uuid('beneficiary_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->float('price', 8, 2)->default(0);
            $table->integer('quantity')->default(1);
            $table->float('price_discount', 8, 2)->default(0);
            $table->float('final_price', 8, 2)->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('order_items');
    }
}
