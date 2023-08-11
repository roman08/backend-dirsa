<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogAcademicLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {

        Schema::create('catalog_academic_level', function (Blueprint $table) {


            $table->id();
            $table->string('name_academic_level')->nullable();
            $table->integer('id_status')->nullable();
            $table->timestamps();
        });
    }



    public function down()

    {

        Schema::dropIfExists('catalog_academic_level');
    }
}
