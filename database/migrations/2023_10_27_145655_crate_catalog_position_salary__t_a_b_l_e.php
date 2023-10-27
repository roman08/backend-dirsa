<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateCatalogPositionSalaryTABLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_position_salary', function (Blueprint $table) {


            $table->id();
            $table->integer('id_position');
            $table->float('min_salary');
            $table->float('max_salary');
            $table->integer('id_status');
            $table->integer('user_id');
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
        //
    }
}
