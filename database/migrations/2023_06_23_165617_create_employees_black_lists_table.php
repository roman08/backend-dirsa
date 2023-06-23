<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesBlackListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_black_lists', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->string("apellido_pat")->nullable();
            $table->string("apellido_mat")->nullable();
            $table->string("name")->nullable();
            $table->string("curp")->nullable();
            $table->integer("id_reasons");
            $table->integer("id_cause");
            $table->string("description")->nullable();
            $table->integer("id_status")->default(1);
            $table->integer("id_user");




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
        Schema::dropIfExists('employees_black_lists');
    }
}
