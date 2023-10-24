<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecritmentProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recritment_prospects', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('apellido_pat')->nullable();
            $table->string('apellido_mat')->nullable();
            $table->string('nombre_completo')->nullable();

            $table->integer('tipo_reclutamiento')->nullable();
            $table->string(
                'curp'
            )->nullable();
            $table->integer(
                'id_sexo'
            )->nullable();
            $table->integer(
                'estado_civil'
            )->nullable();
            $table->integer(
                'nacionalidad'
            )->nullable();
            $table->integer(
                'fuente_reclutamiento'
            )->nullable();
            $table->integer(
                'referido'
            )->nullable();
            $table->string(
                'nombre_referido'
            )->nullable();
            $table->integer(
                'id_pais'
            )->nullable();
            $table->integer(
                'id_estado'
            )->nullable();
            $table->string(
                'calle'
            )->nullable();
            $table->string(
                'no_ext'
            )->nullable();
            $table->string(
                'no_int'
            )->nullable();
            $table->integer(
                'id_municipio'
            )->nullable();

            $table->string(
                'colonia'
            )->nullable();
            $table->string(
                'cp'
            )->nullable();
            $table->string(
                'referencia'
            )->nullable();
            $table->string(
                'tel_personal'
            )->nullable();
            $table->string(
                'email_personal'
            )->nullable();
            $table->integer(
                'id_giro_industria'
            )->nullable();
            $table->integer(
                'id_tiempo_experiencia'
            )->nullable();
            $table->integer(
                'id_nivel_ingles'
            )->nullable();
            $table->integer(
                'id_nivel_estudio'
            )->nullable();
            $table->integer(
                'facilidad_palabra'
            )->nullable();
            $table->integer(
                'id_campaigns_sysca'
            )->nullable();
            $table->integer(
                'id_company_department'
            )->nullable();
            $table->integer(
                'id_ubicaciones'
            )->nullable();
            $table->integer(
                'id_type_schedules'
            )->nullable();
            $table->string(
                'comentarios'
            )->nullable();

            $table->string(
                'cv'
            )->nullable();

            $table->integer(
                'id_recluter'
            )->nullable();

            $table->integer(
                'status'
            )->default(1);

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
        Schema::dropIfExists('recritment_prospects');
    }
}
