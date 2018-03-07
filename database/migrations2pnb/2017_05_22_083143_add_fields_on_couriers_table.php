<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('couriers', function (Blueprint $table) {
            $table->date('date_registered_dti_sec')->nullable();;
            $table->text('current_address')->nullable();
            $table->string('current_address_city', 255)->nullable();
            $table->string('current_address_province', 255)->nullable();
            $table->string('current_address_brgy', 255)->nullable();
            $table->string('current_address_country', 255)->nullable();
            $table->string('current_address_zipcode', 255)->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('permanent_address_city', 255)->nullable();
            $table->string('permanent_address_province', 255)->nullable();
            $table->string('permanent_address_brgy', 255)->nullable();
            $table->string('permanent_address_country', 255)->nullable();
            $table->string('permanent_address_zipcode', 255)->nullable();
            $table->string('contact_person1', 255)->nullable();
            $table->string('contact_person2', 255)->nullable();
            $table->integer('ownership_type')->nullable();
            $table->string('tin', 255);
            $table->integer('business_type');
            $table->string('scanned_dti_sec_registration', 255);
            $table->string('scanned_bir_registration', 255);
            $table->integer('status');
            $table->string('logo', 255);
            $table->string('registration_no', 255);
            $table->string('scanned_business_permit', 255);
            $table->string('current_address_region', 255)->nullable();;
            $table->string('permanent_address_region', 255)->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('couriers', function (Blueprint $table) {
            //
        });
    }
}
