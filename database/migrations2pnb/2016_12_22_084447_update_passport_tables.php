<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePassportTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_access_tokens', function ($table) {
            $table->string('user_id', 36)->nullable()->change();
        });
        Schema::table('oauth_auth_codes', function ($table) {
            $table->string('user_id', 36)->nullable()->change();
        });
        Schema::table('oauth_clients', function ($table) {
            $table->string('user_id', 36)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_access_tokens', function ($table) {
            $table->integer('user_id')->nullable()->change();
        });
        Schema::table('oauth_auth_codes', function ($table) {
            $table->integer('user_id')->nullable()->change();
        });
        Schema::table('oauth_clients', function ($table) {
            $table->integer('user_id')->nullable()->change();
        });
    }
}
