<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdataIdTableStroreExitDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_exit_details', function (Blueprint $table) {
            $table->dropColumn('product_id');
        });
        Schema::table('store_exit_details', function (Blueprint $table) {
            $table->integer('product_income_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
