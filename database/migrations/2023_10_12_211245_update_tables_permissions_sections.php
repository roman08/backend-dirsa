<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesPermissionsSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalog_sections', function (Blueprint $table) {
            $table->string('nomenclature')->nullable();
        });

        Schema::table('catalog_cause_black_lists', function (Blueprint $table) {
            $table->string('id_parent')->nullable();
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
