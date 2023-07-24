<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_history', function (Blueprint $table) {
            $table->id();
            $table->string('type_movement', 191)->nullable();
            $table->integer('type_movement_id')->nullable();
            $table->integer('store_origin_id')->nullable();
            $table->integer('section_origin_id')->nullable();
            $table->integer('movement_id')->nullable();
            $table->integer('internal_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('sku')->nullable();
            $table->string('serail_number')->nullable();
            $table->integer('store_destiny_id')->nullable();
            $table->integer('section_destiny_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('movement_history');
    }
}
