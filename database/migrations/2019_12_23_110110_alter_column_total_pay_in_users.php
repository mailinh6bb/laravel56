<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTotalPayInUsers extends Migration
{
 public function up()
 {
    Schema::table('users', function ($table) {
        $table-> integer('total_pay')->default(0);
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('total_pay');
        });
    }
}