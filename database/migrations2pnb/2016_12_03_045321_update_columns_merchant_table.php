<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('merchants', function (Blueprint $table) {
            $table->date('date_registered_dti_sec');
            $table->text('current_address');
            $table->string('current_address_city');
            $table->string('current_address_province');
            $table->string('current_address_brgy');
            $table->string('current_address_country');
            $table->string('current_address_zipcode');
            $table->text('permanent_address');
            $table->string('permanent_address_city');
            $table->string('permanent_address_province');
            $table->string('permanent_address_brgy');
            $table->string('permanent_address_country');
            $table->string('permanent_address_zipcode');
            $table->string('contact_person1');
            $table->string('contact_person2');
            $table->string('ownership_type');
            $table->string('tin');
            $table->string('business_type');
            $table->string('linked_gcash_no');
            $table->string('scanned_dti_sec_registration');
            $table->string('scanned_bir_registration');
            $table->string('status');
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
            $table->dropColumn('is_published');
            $table->dropColumn('date_registered_dti_sec');
            $table->dropColumn('current_address');
            $table->dropColumn('current_address_city');
            $table->dropColumn('current_address_province');
            $table->dropColumn('current_address_brgy');
            $table->dropColumn('current_address_country');
            $table->dropColumn('current_address_zipcode');
            $table->dropColumn('permanent_address');
            $table->dropColumn('permanent_address_city');
            $table->dropColumn('permanent_address_province');
            $table->dropColumn('permanent_address_brgy');
            $table->dropColumn('permanent_address_country');
            $table->dropColumn('permanent_address_zipcode');
            $table->dropColumn('contact_person1');
            $table->dropColumn('contact_person2');
            $table->dropColumn('ownership_type');
            $table->dropColumn('tin');
            $table->dropColumn('business_type');
            $table->dropColumn('linked_gcash_no');
            $table->dropColumn('scanned_dti_sec_registration');
            $table->dropColumn('scanned_bir_registration');
            $table->dropColumn('status');
        });
    }
}
