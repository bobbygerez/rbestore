<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnProductEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            $table->dropColumn('merchant_user_id');
            $table->dropColumn('merchant_id');
            $table->dropColumn('enquiry_no');
            $table->dropColumn('is_merchant_reply');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            //
        });
    }
}
