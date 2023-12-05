<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_number')->nullable()->default('NULL');
            $table->integer('id_bank')->nullable()->default(0);
            $table->string('branch')->nullable()->default('NULL');
            $table->string('account_holder')->nullable()->default('NULL');
            $table->string('executive')->nullable()->default('NULL');
            $table->string('email')->nullable()->default('NULL');
            $table->string('phone')->nullable()->default('NULL');
            $table->string('concentrator')->nullable()->default('NULL');
            $table->string('accounting_account', 50)->nullable()->default('NULL');
            $table->integer('id_currency')->nullable()->default(0);
            $table->integer('id_complementary_account')->nullable()->default(0);
            $table->integer('id_status')->nullable()->default(0);
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
        Schema::dropIfExists('bank_accounts');
    }
}
