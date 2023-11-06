<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_vacations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('admission_date');
            $table->integer('period');
            $table->integer('total_days');
            $table->integer('update_days');
            $table->integer('status_id');
            $table->integer('admin_user_id');
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
        Schema::dropIfExists('users_vacations');
    }
}
