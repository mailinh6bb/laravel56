<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTrCancelInTableTransactions extends Migration
{
    public function up()
   {
    Schema::table('transactions', function ($table) {
        $table-> tinyInteger('tr_cancel')->default(0);

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function ($table) {
            $table->dropColumn('tr_cancel');
            
        });
    }
}
