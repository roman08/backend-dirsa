<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {

        Schema::create('vacancies_list', function (Blueprint $table)  {


            $table->id();
            $table->string('date')->nullable();
            $table->integer('id_position')->nullable();
            $table->integer('id_company')->nullable();
            $table->integer('id_department')->nullable();
            $table->integer('id_type_structure')->nullable();
            $table->integer('id_type_schedule')->nullable();
            $table->integer('id_campaing')->nullable();
            $table->integer('id_age_range')->nullable();
            $table->integer('id_academic_level')->nullable();
            $table->integer('id_job_experience')->nullable();
            $table->integer('vacancy_numbers')->nullable();
            $table->string('salary')->nullable();
            $table->string('required_skills')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('id_status')->nullable();
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }



    public function down()

    {

        Schema::dropIfExists('vacancies_list');
    }
}
