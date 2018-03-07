<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProductEnquiryRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_enquiry_replies', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('product_enquiry_id');
            $table->text('messages');
            $table->uuid('merchant_user_id');
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
        Schema::table('product_enquiry_replies', function (Blueprint $table) {
            //
        });
    }
}
