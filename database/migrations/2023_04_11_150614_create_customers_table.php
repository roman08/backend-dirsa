<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('no_cliente');
            $table->string('razon_social');
            $table->string('rfc');
            $table->integer('idPais');
            $table->integer('idCiudad');
            $table->string('idMunicipio');
            $table->string('calle');
            $table->string('no_ext');
            $table->string('no_int');
            $table->string('url_map');
            $table->string('observaciones');
            $table->string('cp_fiscal');
            $table->integer('idUsoCfdi');
            $table->string('idRegimenFiscal');
            $table->string('nombre_completo');
            $table->string('email');
            $table->string('movil');
            $table->string('tel_trabajo');
            $table->string('ext');
            $table->string('puesto');

            $table->string('nombre_completo_tecnico');
            $table->string('email_tecnico');
            $table->string('movil_tecnico');
            $table->string('tel_trabajo_tecnico');
            $table->string('ext_tecnico');
            $table->string('puesto_tecnico');


            $table->string('nombre_completo_pago');
            $table->string('email_pago');
            $table->string('movil_pago');
            $table->string('tel_trabajo_pago');
            $table->string('ext_pago');
            $table->string('puesto_pago');

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
        Schema::dropIfExists('customers');
    }
}
