<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToMerchantOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_order', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('courier_id')->nullable();
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
        Schema::table('merchant_order', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('updated_by');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        if(Schema::hasColumn('courier_id')) {
            Schema::table('merchant_order', function (Blueprint $table) {
                $table->dropColumn('courier_id');
            });
        }
    }
}
