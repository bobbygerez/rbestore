<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('discount_type')->default(1); //1 => Cart Discount, 2 => Cart % Discount, 3 => Product Discount, 4 => Product % Discount
            $table->float('discount_value', 8, 2)->default(0);
            $table->date('expiry_date');
            $table->string('status')->default('Active');
            //conditions
            $table->float('minimum_spend')->default(0);
            $table->float('maximum_spend')->default(0);
            $table->string('products')->nullable(); //comma separated product id
            $table->string('excluded_products')->nullable(); //comma separated product id
            $table->string('product_categories')->nullable(); //comma separated category id
            $table->string('excluded_product_categories')->nullable(); //comma separated category id
            $table->string('emails')->nullable(); //comma separated users emails
            //limits
            $table->integer('coupon_limits')->default(1); //limits on how many times the coupon will be used.
            $table->integer('user_limits')->default(1); //limits on how many time the coupon will be used by individual user.
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
        Schema::dropIfExists('coupons');
    }
}
