<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //product_income_store_detail  id_movement 


        Schema::table('product_income_store_detail', function (Blueprint $table) {

            $table->integer(
                'id_movement'
            )->nullable();
        });



        Schema::table(
            'store_exits',
            function (Blueprint $table) {

                $table->integer(
                    'receives_id'
                )->nullable();
            }
        );
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
