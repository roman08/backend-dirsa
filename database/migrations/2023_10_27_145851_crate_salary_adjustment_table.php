<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateSalaryAdjustmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_adjustment', function (Blueprint $table) {


            $table->id();
            $table->integer('user_id');
            $table->integer('previous_department_id');
            $table->integer('previous_subcategory_id');
            $table->integer('previous_position_id');
            $table->integer('previous_campania_id')->nullable()->default(0);
            $table->float('previous_salary');
            $table->date('admission_date');
            $table->float('salary_adjustment');
            $table->integer('updated_department_id');
            $table->integer('updated_subcategory_id');
            $table->integer('updated_position_id');
            $table->integer('updated_campania_id')->nullable()->default(0);
            $table->float('updated_salary');
            $table->integer('authorized_user_id');
            $table->string('observations');
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
