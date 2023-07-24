<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('inventory_Status');
        
        Schema::table('product_income_store_detail', function (Blueprint $table) {
            $table->dropColumn('amount');
        });

        Schema::table('transfer_store', function (Blueprint $table) {
            $table->integer('income_id')->nullable();
            $table->integer('product_id')->nullable();
        });
         
        Schema::table('store_exits', function (Blueprint $table) {
            $table->integer('movement_id')->nullable();
            $table->integer('product_id')->nullable();
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
