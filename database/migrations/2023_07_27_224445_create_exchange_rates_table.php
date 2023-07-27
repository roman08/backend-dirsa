<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_rate', function (Blueprint $table) {
            $table->id();
            $table->decimal('exchange_rate_sale', 8, 2)->nullable();
            $table->decimal('exchange_rate_sale_doit', 8, 2)->nullable();
            $table->decimal('exchange_rate_buy', 8, 2)->nullable();
            $table->decimal('exchange_rate_buy_doit', 8, 2)->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('exchange_rate');
    }
}
