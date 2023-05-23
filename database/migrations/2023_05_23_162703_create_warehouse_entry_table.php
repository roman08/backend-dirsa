<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_entry', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id');
            $table->integer('section_id');
            $table->integer('warehouse_entry_type_id');
            $table->integer('purchase_order_number');
            $table->string('invoice');
            $table->date('invoice_date');
            $table->integer('provider_id');
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
        Schema::dropIfExists('warehouse_entry');
    }
}
