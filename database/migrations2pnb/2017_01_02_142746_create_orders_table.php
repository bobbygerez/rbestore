<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('order_number');
            $table->string('order_reference'); //contains beneficiary and reference
            $table->float('order_subtotal', 8, 2)->default(0);
            $table->float('order_total', 8, 2)->default(0);
            $table->float('order_tax', 8, 2)->default(0);
            $table->float('order_shipping', 8, 2)->default(0);
            $table->float('order_discount', 8, 2)->default(0);
            $table->float('coupon_discount', 8, 2)->default(0);
            $table->string('coupon_code')->nullable();
            $table->string('order_currency')->nullable();
            $table->string('order_status')->default('Pending');
            $table->uuid('shipment_id')->nullable();
            $table->uuid('payment_id')->nullable();
            $table->date('delivery_date');
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
        Schema::dropIfExists('orders');
    }
}
