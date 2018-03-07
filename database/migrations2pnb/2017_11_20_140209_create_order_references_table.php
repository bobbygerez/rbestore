<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_references', function (Blueprint $table) {
            $table->string('reference');
            $table->timestamps();
            $table->uuid('user_id');
            $table->uuid('beneficiary_id');
            $table->uuid('order_id');
            $table->uuid('merchant_id');
            $table->string('status_complete')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->string('status_validation')->nullable();
            $table->dateTime('validated_at')->nullable();
            $table->string('status_cashier')->nullable();
            $table->dateTime('cashier_at')->nullable();
            $table->string('override_by')->nullable();
            $table->text('remarks')->nullable();
            $table->primary('reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_references');
    }
}
