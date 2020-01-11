<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCodeAndTimeCodeInTableUsers extends Migration
{
   public function up()
   {
    Schema::table('users', function ($table) {
        $table-> string('code')->nullable()->index();
        $table-> timestamp('time_code')->nullable();

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
            $table->dropColumn('code');
            $table->dropColumn('time_code');
            
        });
    }
}
