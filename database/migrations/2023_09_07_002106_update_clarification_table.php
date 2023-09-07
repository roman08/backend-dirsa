<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClarificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clarifications', function (Blueprint $table) {
            $table->dropColumn('hours');
        });

        Schema::table('clarifications', function (Blueprint $table) {
            $table->integer('days')->nullable();
            $table->binary('metadata')->nullable();
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
