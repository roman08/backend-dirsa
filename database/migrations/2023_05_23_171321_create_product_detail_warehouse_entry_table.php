<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailWarehouseEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail_warehouse_entry', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_entry_detail_id');
            $table->integer('product_id');
            $table->string('product_name'); 
            $table->string('brand_name');
            $table->string('sku');
            $table->string('serial_number');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail_warehouse_entry');
    }
}
