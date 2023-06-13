<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNameV2Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::rename('warehouse_entry', 'income_store'); //
        Schema::rename('warehouse_entry_detail', 'income_store_detail'); //
        Schema::rename('warehouse_income_type', 'catalog_income_type'); //
        Schema::rename('product_detail_warehouse_entry', 'product_income_store_detail'); //
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
