<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('prospect_employee', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(null);
            $table->string('platform')->default(null);
            $table->string('name_full')->default(null);
            $table->string('mail')->default(null);
            $table->string('phone')->default(null);
            $table->integer('age')->default(null);
            $table->string('english_level')->default(null);
            $table->string('service_experience')->default(null);
            $table->string('state_residence')->default(null);
            $table->string('municipality_delegations')->default(null);
            $table->string('personal_computer')->default(null);
            $table->string('internet_provider')->default(null);
            $table->string('financial_dependents')->default(null);
            $table->string('experience_computer')->default(null);
            $table->string('labor_days')->default(null);
            $table->string('dual_monitor')->default(null);
            $table->string('monthly_salary')->default(null);
            $table->string('means_communication')->default(null);
            $table->string('educational_level')->default(null);
            $table->string('campaign')->default(null);
            $table->date('birthdale')->default(null);
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
        Schema::dropIfExists('prospect_employee');
    }
}
