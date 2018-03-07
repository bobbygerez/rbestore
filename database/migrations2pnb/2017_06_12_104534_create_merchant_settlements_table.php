<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_settlements', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('merchant_id');
            $table->uuid('order_id');
            $table->float('amount', 8, 2)->default(0);
            $table->string('attachment')->nullable();
            $table->string('status');
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('merchant_settlements');
    }
}

