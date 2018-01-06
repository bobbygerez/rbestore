<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')
                ->on('items');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')
                ->on('colors');
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
        Schema::dropIfExists('color_item');
    }
}
