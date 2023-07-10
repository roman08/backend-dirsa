<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableIncomeStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('income_store', function (Blueprint $table) {
            $table->dropColumn('observation');
        });
     
        Schema::table('income_store', function (Blueprint $table) {
            $table->dropColumn('purchase_order_number');
        });
        Schema::table('income_store', function (Blueprint $table) {
            $table->string('observation', 191);
            $table->string('purchase_order_number', 191);
            $table->integer('users_id');
            $table->integer('id_status')->default(1);

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
