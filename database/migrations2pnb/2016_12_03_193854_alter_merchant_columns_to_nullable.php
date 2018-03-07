<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMerchantColumnsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->date('date_registered_dti_sec')->nullable()->change();
            $table->text('current_address')->nullable()->change();
            $table->string('current_address_city')->nullable()->change();
            $table->string('current_address_province')->nullable()->change();
            $table->string('current_address_brgy')->nullable()->change();
            $table->string('current_address_country')->nullable()->change();
            $table->string('current_address_zipcode')->nullable()->change();
            $table->text('permanent_address')->nullable()->change();
            $table->string('permanent_address_city')->nullable()->change();
            $table->string('permanent_address_province')->nullable()->change();
            $table->string('permanent_address_brgy')->nullable()->change();
            $table->string('permanent_address_country')->nullable()->change();
            $table->string('permanent_address_zipcode')->nullable()->change();
            $table->string('contact_person1')->nullable()->change();
            $table->string('contact_person2')->nullable()->change();
            $table->string('ownership_type')->nullable()->change();
            $table->string('tin')->nullable()->change();
            $table->string('business_type')->nullable()->change();
            $table->string('linked_gcash_no')->nullable()->change();
            $table->string('scanned_dti_sec_registration')->nullable()->change();
            $table->string('scanned_bir_registration')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchants', function (Blueprint $table) {
            //
        });
    }
}
