<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_store', function (Blueprint $table) {
            $table->id();
            $table->integer("store_origin_id");
            $table->integer("section_origin_id");
            $table->integer("store_destiny_id");
            $table->integer("section_destiny_id");
            $table->integer("category_id");
            $table->integer("subcategory_id");
            $table->integer("brand_id");
            $table->integer("user_id");
            $table->string("observation");
            $table->integer("id_status");
            $table->integer("amount");
            $table->integer("total_received");
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
        Schema::dropIfExists('transfer_store');
    }
}
