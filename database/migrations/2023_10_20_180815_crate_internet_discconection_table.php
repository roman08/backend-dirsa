<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateInternetDiscconectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('internet_disconnection', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('high_duration', 191)->nullable();
            $table->string('reason_failure', 191)->nullable();
            $table->integer('counter')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('fiel_extra', 191)->nullable();
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
