<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubccaregoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subCcategorie', function (Blueprint $table) {
            $table->id();
            $table->string('nameSub');
            $table->string('nameCat');  
            $table->integer('idCat');
            $table->timestamp('registro');
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
        Schema::dropIfExists('subCcategorie');
    }
}
