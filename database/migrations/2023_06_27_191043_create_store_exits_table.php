<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreExitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_exits', function (Blueprint $table) {
            $table->id();
            $table->integer("store_origin_id")->nullable();
            $table->integer("section_origin_id")->nullable();
            $table->integer("id_type_exit")->nullable();
            $table->integer("user_id")->nullable();
            $table->integer("authorized_id")->nullable();
            $table->string("person_who_receives")->nullable();
            $table->integer("category_id")->nullable();
            $table->integer("subcategory_id")->nullable();
            $table->integer("brand_id")->nullable();
            $table->string("observations")->nullable();
            $table->integer("amount")->nullable();
            $table->integer("total_received")->nullable();
            $table->integer("id_status")->default(1);

            


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
        Schema::dropIfExists('store_exits');
    }
}
