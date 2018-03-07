<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('weight')->nullable()->change();
            $table->string('weight_unit')->nullable()->change();
            $table->string('height')->nullable()->change();
            $table->string('height_unit')->nullable()->change();
            $table->string('width')->nullable()->change();
            $table->string('width_unit')->nullable()->change();
            $table->string('product_unit')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
