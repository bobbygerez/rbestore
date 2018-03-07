<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToUserBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_beneficiaries', function (Blueprint $table) {
            $table->boolean('activated')->default(false);
            $table->string('verification_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_beneficiaries', function (Blueprint $table) {
            $table->dropColumn('activated');
            $table->dropColumn('verification_code');
        });
    }
}
