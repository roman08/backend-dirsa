<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('payroll_cuts', function (Blueprint $table) {
            $table->id();
            $table->integer('yaer');
            $table->string('month')->nullable()->comment = '1,2,3...'; // 1=january , ...6
            $table->date('pay_day');
            $table->date('start_day');
            $table->date('end_day');
            $table->date('dispersion_day');
            $table->string('court');
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
        Schema::dropIfExists('payroll_cuts');
    }
}
