<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVacationsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_vacations_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vacation_id');
            $table->date('application_date');
            $table->integer('days_requested');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('observations', 191);
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
        Schema::dropIfExists('users_vacations_details');
    }
}
