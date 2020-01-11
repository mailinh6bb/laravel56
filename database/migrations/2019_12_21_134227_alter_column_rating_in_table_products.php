<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnRatingInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
            $table-> integer('pro_total_rating')->default(0)->comment('Tổng Số User Đánh Giá');
            $table-> integer('pro_total_number')->default(0) -> comment('Tổng Số Điểm Đánh Giá');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function ($table) {
            $table->dropColumn('pro_total_rating');
            $table->dropColumn('pro_total_number');
        });
    }
}
