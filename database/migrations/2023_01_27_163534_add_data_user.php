<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
//...
    Schema::table('users', function(Blueprint $table){
            $table->string('nombre_completo');
            $table->integer('numero_empleado');
            $table->string('curp')->nullable();
            $table->integer('ejecucion_administrativa')->nullable();
            $table->integer('id_compania')->nullable();
            $table->string('ola')->nullable();
            $table->integer('id_puesto');
            $table->float('sueldo')->nullable()->default(0);
            $table->string('fecha_ingreso')->nullable();
            $table->string('fecha_contrato')->nullable();
            $table->string('rfc')->nullable();
            $table->string('nss')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->integer('id_sexo')->nullable();
            $table->string('fecha_pago')->nullable();
            $table->integer('id_banco')->nullable();
            $table->string('numero_cuenta_bancaria')->nullable();
            $table->string('clabe_inter_bancaria')->nullable();
            $table->integer('id_estatus');
            $table->integer('id_departamento_empresa')->nullable();
            $table->integer('id_turno')->nullable();
            $table->string('fecha_baja')->nullable();
            $table->string('motivo_baja')->nullable();
            $table->string('fecha_inicio_capacitacion')->nullable();
            $table->string('fecha_fin_capacitacion')->nullable();
            $table->integer('id_subcategoria')->nullable();
            $table->integer('id_domicilo')->nullable();
            $table->string('nota')->nullable();
            $table->string('mes_baja')->nullable();
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
