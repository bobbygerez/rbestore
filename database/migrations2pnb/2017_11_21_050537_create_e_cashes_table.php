<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateECashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_cashes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('merchant_id');
            $table->string('card_number');
            $table->float('debit')->default(0);
            $table->float('credit')->default(0);
            $table->float('balance')->default(0);
            $table->uuid('transaction_to_id')->nullable();
            $table->string('attachment')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('e_cashes');
    }
}
