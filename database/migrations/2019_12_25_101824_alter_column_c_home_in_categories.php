<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCHomeInCategories extends Migration
{
    public function up()
 {
    Schema::table('categories', function ($table) {
        $table-> tinyInteger('c_home')->default(0);
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function ($table) {
            $table->dropColumn('c_home');
        });
    }
}
