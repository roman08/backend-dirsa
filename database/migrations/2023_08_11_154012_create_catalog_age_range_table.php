<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogAgeRangeTable extends Migration
{
    /**
     * Run the migrations.
     *            $table->timestamps();

     * @return void
     */
    public function up()

    {

        Schema::create('catalog_age_range', function (Blueprint $table) {


            $table->id();
            $table->string('name_age_range')->nullable();
            $table->integer('id_status')->nullable();
            $table->timestamps();
        });
    }



    public function down()

    {

        Schema::dropIfExists('catalog_age_range');
    }

}
