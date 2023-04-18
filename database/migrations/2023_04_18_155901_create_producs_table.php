<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducsTable extends Migration
{
    /**
     * Run the migrations.
     *si eres atrevida sexualmente
     * @return void
     */
    public function up()
    {
        Schema::create('producs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoty');
            $table->integer('id_subcategory');
            $table->string('sku');
            $table->string('serial_number');
            $table->integer('id_brand');
            $table->string('model');
            $table->string('description');
            $table->boolean('inventory');
            $table->string('photo');
            $table->integer('id_status');
            $table->integer('id_unitmeasure');
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
        Schema::dropIfExists('producs');
    }
}
