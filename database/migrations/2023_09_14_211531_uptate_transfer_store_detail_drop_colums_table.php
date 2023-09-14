<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UptateTransferStoreDetailDropColumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('transfer_store_detail', function (Blueprint $table) {
            $table->dropColumn('product_name');
            $table->dropColumn('brand_name');
            $table->dropColumn('model_name');
            $table->dropColumn('sku');
            $table->dropColumn('serial_number');
            $table->renameColumn('product_id', 'product_income_id');
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
