<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClarificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clarifications', function (Blueprint $table) {
            $table->dropColumn('days');
            $table->dropColumn('metadata');
        });

        Schema::table('clarifications', function (Blueprint $table) {
            $table->integer(
                'campaign_id')->nullable();
            $table->integer(
                'employee_number')->nullable();
            $table->integer(
            'name')->nullable();
            $table->integer(
            'date')->nullable();
            $table->integer('cut_date')->nullable();
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
