<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


    Schema::rename('agent_hours','agent_hours_sysca'); //
	Schema::rename('bancos','banks_catalog'); //
	Schema::rename('campanias','campaigns_sysca'); //
	Schema::rename('campania_configuracion_por_mes', 'campaigns_month_config_sysca');//
	Schema::rename('campania_grupo_agentes', 'campaigns_group_agents_sysca'); //
	Schema::rename('campania_supervisors', 'campaigns_supervisor_sysca'); //
	Schema::rename('catalogo_sat_regimenfiscal','catalog_sat_tax_regime'); //
	Schema::rename('catalogo_sat_uso_cfdi','catalog_sat_cfdi_use'); //
	
	Schema::rename('cat_brands','catalog_brands');//
	Schema::rename('cat_categories','catalog_categories'); //
	Schema::rename('cat_modues','catalog_modules'); //
	
	Schema::rename('cat_subcategories','catalog_subcategories'); //
	Schema::rename('cat_type_origins','catalog_type_origing_sysca'); //
	Schema::rename('ciudades','cities'); //
	
	
	Schema::rename('delegaciones','township'); //
	Schema::rename('departamentos','company_department'); //
	
	Schema::rename('domicilio_usuarios','users_addresses'); //
	Schema::rename('ejecucion_administrativas','company_structure_type'); //
	Schema::rename('empresas','companies_payment'); //
	Schema::rename('entrance_stores','income_stores'); //
	Schema::rename('estatus','status'); //
	
	Schema::rename('grupos','groups_sysca'); //
	Schema::rename('grupo_usuarios','groups_users_sysca'); //
	Schema::rename('hours_campanias', 'campaign_hours_sysca'); //
	
	
	Schema::rename('module_permisses','module_users_permissions'); //
	
	Schema::rename('paises','countries'); //
	
	
	Schema::rename('producs','products'); //

	Schema::rename('puestos','catalog_company_position'); //
	Schema::rename('secctions','store_sections'); //
	Schema::rename('sexos','gender'); //

	Schema::rename('subcategorias','catalog_company_subcategories');
	Schema::rename('subccategorie','category_subcategories');//

	Schema::rename('tipo_usuarios','user_type'); //
	Schema::rename('turnos','type_schedule'); //

        
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
