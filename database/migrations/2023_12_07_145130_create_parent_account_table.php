<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_account', function (Blueprint $table) {
            $table->id();
            $table->string('account')->nullable()->default('NULL');
            $table->string('account_description')->nullable()->default('NULL');
            $table->string('levelA')->nullable()->default('NULL');
            $table->string('levelB')->nullable()->default('NULL');
            $table->string('levelC')->nullable()->default('NULL');
            $table->integer('id_subcategory')->nullable();
            $table->integer('id_status');
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
        Schema::dropIfExists('parent_account');
    }
}
