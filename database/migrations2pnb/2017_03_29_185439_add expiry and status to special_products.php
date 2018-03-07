<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpiryAndStatusToSpecialProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('special_products', function (Blueprint $table) {
            $table->date('expiry')->nullable();
            $table->string('status')->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('special_products', function (Blueprint $table) {
            $table->dropColumn('expiry');
            $table->dropColumn('status');
        });
    }
}
