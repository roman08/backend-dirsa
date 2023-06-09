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


    Schema::rename('agent_hours','agent_hours_sysca');
	Schema::rename('bancos','banks_catalog');
	Schema::rename('campanias','campaigns_sysca');
	Schema::rename('campania_configuracion_por_mes', 'campaigns_month_config_sysca');
	Schema::rename('campania_grupo_agentes', 'campaigns_group_agents_sysca');
	Schema::rename('campania_supervisors', 'campaigns_supervisor_sysca');
	Schema::rename('catalogo_sat_regimenfiscal','catalog_sat_tax_regime');
	Schema::rename('catalogo_sat_uso_cfdi','catalog_sat_cfdi_use');
	// Schema::rename('category_brands','');
	Schema::rename('cat_brands','catalog_brands');
	Schema::rename('cat_categories','catalog_categories');
	Schema::rename('cat_modues','catalog_modules');
	// Schema::rename('cat_module_permissions','');
	Schema::rename('cat_subcategories','catalog_subcategories');
	Schema::rename('cat_type_origins','catalog_type_origing_sysca');
	Schema::rename('ciudades','cities');
	// Schema::rename('count_files','');
	// Schema::rename('customers','');
	Schema::rename('delegaciones','township');
	Schema::rename('departamentos','company_department');
	// Schema::rename('detail_log','');
	Schema::rename('domicilio_usuarios','users_addresses');
	Schema::rename('ejecucion_administrativas','company_structure_type');
	Schema::rename('empresas','companies_payment');
	Schema::rename('entrance_stores','income_stores');
	Schema::rename('estatus','status');
	// Schema::rename('failed_jobs','');
	Schema::rename('grupos','groups_sysca');
	Schema::rename('grupo_usuarios','groups_users_sysca');
	Schema::rename('hours_campanias', 'campaign_hours_sysca');
	// Schema::rename('logs','');
	// Schema::rename('migrations','');
	Schema::rename('module_permisses','module_users_permissions');
	// Schema::rename('obt_hours_campanias','obt_hours_campanias');
	Schema::rename('paises','countries');
	// Schema::rename('password_resets','');
	// Schema::rename('personal_access_tokens','');
	Schema::rename('producs','products');
	// Schema::rename('product_detail_temporary_warehouse_entry','');
	// Schema::rename('product_detail_warehouse_entry','');
	Schema::rename('puestos','catalog_company_position');
	Schema::rename('secctions','store_sections');
	Schema::rename('sexos','gender');
	// Schema::rename('stores','catalog_stores');
	// Schema::rename('store_secctions','');
	Schema::rename('subcategorias','catalog_company_subcategories');
	Schema::rename('subccategorie','category_subcategories');
	// Schema::rename('supervisor_campanas','');
	// Schema::rename('suppliers','suppliers');
	Schema::rename('tipo_usuarios','user_type');
	Schema::rename('turnos','type_schedule');
	// Schema::rename('type_modules','');
	// Schema::rename('type_pays','');
	// Schema::rename('ubicaciones','');
	// Schema::rename('ubicaciones_agentes','');
	// Schema::rename('users','');
	// Schema::rename('warehouse_entry','');
	// Schema::rename('warehouse_entry_detail','');
	// Schema::rename('warehouse_income_ty','');
        // nombre actual - nombre nuevo
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
