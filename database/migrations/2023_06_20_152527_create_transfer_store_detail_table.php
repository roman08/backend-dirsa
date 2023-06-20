<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferStoreDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_store_detail', function (Blueprint $table) {
            $table->id();
            $table->integer("id_transfer_store");
            $table->integer("product_id");
            $table->string("product_name");
            $table->string("brand_name");
            $table->string("model_name");
            $table->string("sku");
            $table->string("serial_number");
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
        Schema::dropIfExists('transfer_store_detail');
    }
}
