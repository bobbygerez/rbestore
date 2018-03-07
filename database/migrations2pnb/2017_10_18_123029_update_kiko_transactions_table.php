<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKikoTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kiko_transactions', function (Blueprint $table) {
            $table->renameColumn('amount', 'debit');
            $table->float('credit')->default(0);
            $table->float('balance')->default(0);
            $table->uuid('user_id')->nullable();
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kiko_transactions', function (Blueprint $table) {
            $table->renameColumn('debit', 'amount');
            $table->dropColumn('credit');
            $table->dropColumn('balance');
            $table->dropColumn('user_id');
            $table->string('type');
        });
    }
}
