<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->integer('no_proveedor');
            $table->string('razon_social');
            $table->string('rfc');
            $table->integer('idPais');
            $table->integer('idCiudad');
            $table->integer('idMunicipio');
            $table->string('calle');
            $table->string('no_ext');
            $table->string('no_int');
            $table->string('colonia');
            $table->string('cp');
            $table->string('sitio_web');
            $table->string('url_map');
            $table->string('observaciones');
            $table->integer('dias_credito');
            $table->integer('idBanco');
            $table->string('no_cuenta');
            $table->string('clabe_intenbancaria');
            $table->string('nombre_completo');
            $table->string('email');
            $table->string('tel_movil');
            $table->string('tel_trabajo');
            $table->string('ext');
            $table->string('puesto');







            














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
        Schema::dropIfExists('suppliers');
    }
}
