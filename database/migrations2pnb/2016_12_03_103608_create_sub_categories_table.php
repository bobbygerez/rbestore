<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_id');
            $table->uuid('child_id');
            $table->integer('ordering');
            $table->softDeletes();
            $table->timestamps();
        });

        //add ordering to categories
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('ordering');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');

        Schema::table('categories', function ($table) {
            $table->dropColumn('ordering');
        });
    }
}
