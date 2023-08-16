<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricalEmployeeStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('historical_employee_status', function (Blueprint $table) {


            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('employeed_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('reason_id')->nullable();
            $table->integer('cause_id')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('historical_employee_status');
    }
}
