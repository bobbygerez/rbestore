<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('merchant_id');
            $table->string('product_name');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->string('sku');
            $table->integer('stock');
            $table->float('weight', 11, 2);
            $table->string('weight_unit');
            $table->float('height', 11, 2);
            $table->string('height_unit');
            $table->float('width', 11, 2);
            $table->string('width_unit');
            $table->string('product_unit');
            $table->boolean('is_published');
            $table->boolean('is_featured');
            $table->boolean('is_downloadable');
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
        Schema::drop('products');
    }
}
