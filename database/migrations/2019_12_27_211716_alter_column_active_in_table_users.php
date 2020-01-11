<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnActiveInTableUsers extends Migration
{
 public function up()
 {
    Schema::table('users', function ($table) {
        $table-> string('code_active')->nullable()->index();
        $table-> timestamp('time_active')->nullable();

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
            $table->dropColumn('code_active');
            $table->dropColumn('time_active');
            
        });
    }
}
