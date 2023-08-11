<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogJobExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *           
     * @return void
     */
    public function up()

    {

        Schema::create('catalog_job_experience', function (Blueprint $table) {


            $table->id();
            $table->string('name_job')->nullable();
            $table->integer('id_status')->nullable();
            $table->timestamps();
        });
    }



    public function down()

    {

        Schema::dropIfExists('catalog_job_experience');
    }

}
