<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClarificationsTypeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clarifications', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('cut_date');

        });

        Schema::table('clarifications', function (Blueprint $table) {

            $table->string(
                'date'
            )->nullable();
            $table->string('cut_date')->nullable();
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
