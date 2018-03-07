<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewAndOldPriceInSpecialProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('special_products', function (Blueprint $table) {
            $table->float('old_price', 8, 2)->default(0);
            $table->float('new_price', 8, 2)->default(0);
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
            $table->dropColumn('old_price');
            $table->dropColumn('new_price');
        });
    }
}
