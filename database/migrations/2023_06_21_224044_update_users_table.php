<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellido_mat')->nullable()->change();
            $table->string('rfc')->nullable()->change();
            $table->string('nss')->nullable()->change();
            $table->string('colonia')->nullable();
            $table->integer('no_int')->nullable();
            $table->integer('cp')->nullable();
            $table->string('referencia')->nullable()->change();
            $table->integer('id_puesto')->nullable()->change();
            $table->integer('ejecucion_administrativa')->nullable()->change();
            $table->integer('id_departamento_empresa')->nullable()->change();
            $table->integer('id_subcategoria')->nullable()->change();
            $table->integer('id_turno')->nullable()->change();
            $table->integer('id_ubicacion')->nullable()->change();
            $table->date('fecha_ingreso')->nullable()->change();
            $table->integer('tel_laboral')->nullable();
            $table->string('email')->nullable()->change();
            $table->integer('id_empresa_rh')->nullable()->change();
            $table->float('sueldo')->nullable()->change();
            $table->string('fecha_pago')->nullable()->change();
            $table->integer('id_banco')->nullable()->change();
            $table->string('numero_cuenta_bancaria')->nullable()->change();
            $table->string('clabe_inter_bancaria')->nullable()->change();


            $table->string('nacionalidad')->nullable();
            $table->integer('id_estado_civil')->nullable();
            $table->integer('id_pais')->nullable();
            $table->integer('id_estado')->nullable();
            $table->string('calle')->nullable();
            $table->integer('no_ext')->nullable(); 
            $table->integer('id_municipio')->nullable();
            $table->string('tel_personal')->nullable();

            
            
            
            
            
            
            
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
