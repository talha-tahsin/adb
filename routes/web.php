<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRoleController;

/** :: Societal Controller :: */
use App\Http\Controllers\Societal\SocietalViewController;
use App\Http\Controllers\Societal\PopulationController;
use App\Http\Controllers\Societal\HouseholdController;
use App\Http\Controllers\Societal\LandController;
use App\Http\Controllers\Societal\OccupationController;
use App\Http\Controllers\Societal\LivelihoodController;
use App\Http\Controllers\Societal\IncomeController;
use App\Http\Controllers\Societal\ExpenditureController;
use App\Http\Controllers\Societal\EconomicController;
use App\Http\Controllers\Societal\LivelihoodTrainingController;
use App\Http\Controllers\Societal\EducationController;
use App\Http\Controllers\Societal\HealthController;
use App\Http\Controllers\Societal\WaterController;
use App\Http\Controllers\Societal\SanitationController;
use App\Http\Controllers\Societal\AccessibilityController;

/** :: Water Resources Controller :: */
use App\Http\Controllers\WaterResources\WaterResourceController;
/** :: Livestock Controller :: */
use App\Http\Controllers\Livestock\LivestockController;

/** :: Para Boundary Controller :: */
use App\Http\Controllers\ParaBoundaryController;
/** :: VCF Boundary Controller :: */
use App\Http\Controllers\VCFBoundaryController;
/** :: LULC Validation Controller :: */
use App\Http\Controllers\LulcValidationController;
/** :: Land Degradation Controller :: */
use App\Http\Controllers\LandDegradationController;
use App\Http\Controllers\WatershedHealthController;


use App\Http\Controllers\UtilsController;

// ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

Route::get('/', [HomeController::class, 'view_dashboard'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'view_dashboard'])->name('dashboard');

Route::get('/login', [HomeController::class, 'view_login'])->name('login');
Route::post('/get_login', [AuthController::class, 'get_login'])->name('get.login');

Route::get('/register', [HomeController::class, 'view_register'])->name('register');
Route::post('/get_register', [AuthController::class, 'store'])->name('get.register');

Route::post('/logout', [AuthController::class, 'get_logout'])->name('logout');

/** Start :: Admin Route */
Route::group(['prefix' => '/',  'middleware' => 'admin_auth'], function(){
    Route::get('user_panel', [HomeController::class, 'view_userPanel'])->name('userPanel');
    Route::get('user_role', [UserRoleController::class, 'get_userRole'])->name('user_role');
    Route::post('updt_role', [UserRoleController::class, 'updt_userRole'])->name('updt_role');
    Route::post('delte_role', [UserRoleController::class, 'delte_userRole'])->name('delte_role');
}); 

Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('watershed-dashboard', [HomeController::class, 'watershed_view'])->name('Watershed.View');
    Route::get('data-entry-dashboard', [HomeController::class, 'data_entry_dashboard'])->name('Data.Entry.Dashboard');
    // Route::get('view_population', [HomeController::class, 'view_population'])->name('View.Population');

    Route::get('get_active_watershed', [UtilsController::class, 'get_active_watershed'])->name('Get.Active.Watershed');
    Route::get('logout_current_watershed', [HomeController::class, 'logout_current_watershed'])->name('Logout.Watershed');
    
    // POST Route
    Route::post('store_watershed_info_for_entry', [HomeController::class, 'store_watershed_info_for_entry']);
});

/** Start :: Para Boundary Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('basic-info-of-para-boundary', [ParaBoundaryController::class, 'show_basic_info'])->name('Para.Boundary.Basic.Info');
    Route::get('view_para_list', [ParaBoundaryController::class, 'show_para_list'])->name('Show.Para.List');
    Route::get('gps-point-of-para-boundary', [ParaBoundaryController::class, 'show_gps_point'])->name('Para.Boundary.GPS.Point');

    // GET Method Route
    Route::get('get_all_para_list', [ParaBoundaryController::class, 'get_all_para_list']);
    Route::get('get_para_details_for_edit', [ParaBoundaryController::class, 'get_para_details_for_edit']);
    Route::get('get_district_name', [UtilsController::class, 'get_district_name']);
    Route::get('get_upazila_list', [UtilsController::class, 'get_upazila_list']);
    Route::get('get_union_list', [UtilsController::class, 'get_union_list']);
   
    // POST Method Route
    Route::post('store_basic_info_para_boundary', [ParaBoundaryController::class, 'store_basic_info_para_boundary']);
    Route::post('store_gps_point_para', [ParaBoundaryController::class, 'store_gps_point_para']);
    Route::post('store_para_name_for_entry', [ParaBoundaryController::class, 'store_para_name_for_entry']);
    Route::post('updt_para_basic_info', [ParaBoundaryController::class, 'updt_para_basic_info']);
   
});

/** Start :: VCF Boundary Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('basic-info-of-vcf-boundary', [VCFBoundaryController::class, 'show_basic_info'])->name('VCF.Boundary.Basic.Info');
    Route::get('gps-point-of-vcf-boundary', [VCFBoundaryController::class, 'show_gps_point'])->name('VCF.Boundary.GPS.Point');
    Route::get('dominant-plant-vcf-boundary', [VCFBoundaryController::class, 'show_dominant_plant'])->name('VCF.Boundary.Dominant.Plant');

    // GET Method Route 
    // Route::get('get_livestock_list', [VCFBoundaryController::class, 'get_livestock_list']);
    // Route::get('get_livestock_edit', [VCFBoundaryController::class, 'get_livestock_edit']);

    // POST Method Route
    Route::post('store_basic_info_vcf_boundary', [VCFBoundaryController::class, 'store_basic_info_vcf_boundary']);
    Route::post('store_gps_point_vcf', [VCFBoundaryController::class, 'store_gps_point_vcf']);
    Route::post('store_plot1_dominant_plants', [VCFBoundaryController::class, 'store_plot1_dominant_plants']);
    Route::post('store_plot2_dominant_plants', [VCFBoundaryController::class, 'store_plot2_dominant_plants']);
    Route::post('store_plot3_dominant_plants', [VCFBoundaryController::class, 'store_plot3_dominant_plants']);
 
});

/** Start :: watershed health survey Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('water-sample-quality', [WatershedHealthController::class, 'watershed_sample_quality'])->name('Watershed.Sample.Quality');
    Route::get('soil-sample-lab-test', [WatershedHealthController::class, 'soil_sample_lab_test'])->name('Soil.Sample.Lab.Test');

    // POST Method
    Route::post('store_water_sample_quality', [WatershedHealthController::class, 'store_water_sample_quality']);
    Route::post('store_water_test_report', [WatershedHealthController::class, 'store_water_test_report']);
    Route::post('store_soil_sample_basic_info', [WatershedHealthController::class, 'store_soil_sample_basic_info']);
    Route::post('store_soil_test_result', [WatershedHealthController::class, 'store_soil_test_result']);
    Route::post('store_soil_texture_class', [WatershedHealthController::class, 'store_soil_texture_class']);
});

/** Start :: Map Unit Wise Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('show-ground-truth-first', [LulcValidationController::class, 'show_ground_truth1'])->name('Ground.Truth.First');
    Route::get('show-ground-truth-second', [LulcValidationController::class, 'show_ground_truth2'])->name('Ground.Truth.Second');
    Route::get('show-land-degradation', [LandDegradationController::class, 'show_land_degradation'])->name('Land.Degradation');
    Route::get('show-map-unit-list', [LandDegradationController::class, 'show_map_unit_list'])->name('Map.Unit.List');

    // GET Method Route 
    Route::get('getindicator1List', [LandDegradationController::class, 'getindicator1List']);
    Route::get('getindicator2List', [LandDegradationController::class, 'getindicator2List']);
    Route::get('getindicator3List', [LandDegradationController::class, 'getindicator3List']);
    Route::get('get_map_unit_list', [LandDegradationController::class, 'get_map_unit_list']);


    // POST Method Route
    Route::post('store_first_ground_truth', [LulcValidationController::class, 'store_first_ground_truth']);
    Route::post('store_second_ground_truth', [LulcValidationController::class, 'store_second_ground_truth']);
    Route::post('store_degradation_info', [LandDegradationController::class, 'store_degradation_info']);
    Route::post('store_existing_conversation', [LandDegradationController::class, 'store_existing_conversation']);
    Route::post('store_future_conversation', [LandDegradationController::class, 'store_future_conversation']);

});

/** Start :: Population View Page */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('population', [SocietalViewController::class, 'population_entry'])->name('Population.Entry');
    Route::get('view_population', [SocietalViewController::class, 'view_population'])->name('View.Population');
   
    // GET Method Route 
    Route::get('/get_population_list', [PopulationController::class, 'get_population_list']);
    Route::get('/get_population_details', [PopulationController::class, 'get_population_details']);

    // POST Method Route 
    Route::post('/insert_populatioin_entry', [PopulationController::class, 'insert_community_population']);
    Route::post('/update_population_details', [PopulationController::class, 'update_population_details']);
    Route::post('/delete_population', [PopulationController::class, 'delete_population']);
});

/** Start :: Household View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('household', [SocietalViewController::class, 'view_household_entry'])->name('View.Entry.Household');
    Route::get('view_household', [SocietalViewController::class, 'get_household_view'])->name('View.Household.Info');
 

    // GET Method Route 
    Route::get('/get_household_info_list', [HouseholdController::class, 'get_household_info_list']);
    Route::get('/get_household_info_edit', [HouseholdController::class, 'get_household_info_edit']);

    // POST Method Route
    Route::post('/entry_household_info', [HouseholdController::class, 'store_household_info']);
    Route::post('/update_household_info', [HouseholdController::class, 'update_household_info']);
    Route::post('/delete_household_info', [HouseholdController::class, 'delete_household_info']);
});

/** Start :: Land View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('land', [SocietalViewController::class, 'view_land_entry'])->name('View.Land.Entry');
    Route::get('view_land_info', [SocietalViewController::class, 'view_land_info'])->name('View.Land.Info');
    // GET Method Route 
    Route::get('/get_land_info_list', [LandController::class, 'get_land_info_list']);
    Route::get('/get_land_info_edit', [LandController::class, 'get_land_info_edit']);
    // POST Method Route
    Route::post('/store_land_info', [LandController::class, 'store_land_info']);
    Route::post('/update_land_info', [LandController::class, 'update_land_info']);
    Route::post('/delete_land_info', [LandController::class, 'delete_land_info']);

});

/** Start :: Occupation View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('occupation', [SocietalViewController::class, 'view_occupation_entry'])->name('View.Occupation.Entry');
    //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    
    // GET Method Route 
    Route::get('/get_occupation_info_list', [OccupationController::class, 'get_occupation_info_list']);
    Route::get('/get_occupation_info_edit', [OccupationController::class, 'get_occupation_info_edit']);

    // POST Method Route
    Route::post('/store_occupation_info', [OccupationController::class, 'store_occupation_info']);
    Route::post('/update_occupation_info', [OccupationController::class, 'update_occupation_info']);
    Route::post('/delete_occupation_info', [OccupationController::class, 'delete_occupation_info']);
});

/** Start :: Livelihood View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('livelihood', [SocietalViewController::class, 'view_livelihood_entry'])->name('View.Livelihood.Entry');
    //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    
    // GET Method Route
    Route::get('/check_livelihood_duplicate', [LivelihoodController::class, 'check_duplicate_record']); 
    Route::get('/get_livelihood_info_list', [LivelihoodController::class, 'get_livelihood_info_list']);
    Route::get('/get_livelihood_info_edit', [LivelihoodController::class, 'get_livelihood_info_edit']);

    // POST Method Route
    Route::post('/store_livelihood_info', [LivelihoodController::class, 'store_livelihood_info']);
    Route::post('/update_livelihood_info', [LivelihoodController::class, 'update_livelihood_info']);
    Route::post('/delete_livelihood_info', [LivelihoodController::class, 'delete_livelihood_info']);

});

/** Start :: Income View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('income', [SocietalViewController::class, 'view_income_entry'])->name('View.Income.Entry');
    
    // GET Method Route 
    Route::get('/get_income_info_list', [IncomeController::class, 'get_income_info_list']);
    Route::get('/get_income_info_edit', [IncomeController::class, 'get_income_info_edit']);

    // POST Method Route
    Route::post('/store_income_info', [IncomeController::class, 'store_income_info']);
    Route::post('/update_income_info', [IncomeController::class, 'update_income_info']);
    Route::post('/delete_income_info', [IncomeController::class, 'delete_income_info']);

});

/** Start :: Expenditure View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('expenditure', [SocietalViewController::class, 'view_expenditure_entry'])->name('View.Expenditure.Entry');
    //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    
    // GET Method Route 
    Route::get('/get_expenditure_info_list', [ExpenditureController::class, 'get_expenditure_info_list']);
    Route::get('/get_expenditure_info_edit', [ExpenditureController::class, 'get_expenditure_info_edit']);

    // POST Method Route
    Route::post('/store_expenditure_info', [ExpenditureController::class, 'store_expenditure_info']);
    Route::post('/update_expenditure_info', [ExpenditureController::class, 'update_expenditure_info']);
    Route::post('/delete_expenditure_info', [ExpenditureController::class, 'delete_expenditure_info']);

});

/** Start :: Economic Status View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('economic', [SocietalViewController::class, 'view_economic_entry'])->name('View.Economic.Entry');
    //Route::get('view_economic_info', [SocietalViewController::class, 'view_economic_info'])->name('View.Economic.Info');
    
    // GET Method Route 
    Route::get('/get_economic_info_list', [EconomicController::class, 'get_economic_info_list']);
    Route::get('/get_economic_info_edit', [EconomicController::class, 'get_economic_info_edit']);

    // POST Method Route
    Route::post('/store_economic_info', [EconomicController::class, 'store_economic_info']);
    Route::post('/update_economic_info', [EconomicController::class, 'update_economic_info']);
    Route::post('/delete_economic_info', [EconomicController::class, 'delete_economic_info']);

});

/** Start :: Livelihoods Generation Training  Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('livelihood-generation-trainig', [LivelihoodTrainingController::class, 'show_livelihoods_generation_training'])->name('Livelihood.Training');
    //Route::get('view_economic_info', [LivelihoodTrainingController::class, 'view_economic_info'])->name('View.Economic.Info');
    
    // GET Method Route 
   

    // POST Method Route
    Route::post('/store_economic_info', [LivelihoodTrainingController::class, 'store_economic_info']);
    

});

/** Start :: Education View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('education_entry', [SocietalViewController::class, 'view_education_part1_entry'])->name('View.EducationPart1.Entry');
    Route::get('education_part2_entry', [SocietalViewController::class, 'view_education_part2_entry'])->name('View.EducationPart2.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_education_info_list', [EducationController::class, 'get_education_info_list']);
    Route::get('/get_education_info_edit', [EducationController::class, 'get_education_info_edit']);

    // POST Method Route
    Route::post('/store_literacy_rate_level', [EducationController::class, 'store_literacy_rate_level']);
    Route::post('/update_education_info', [EducationController::class, 'update_education_info']);
    Route::post('/delete_education_info', [EducationController::class, 'delete_education_info']);

    Route::post('/store_availability_education_institution', [EducationController::class, 'store_availability_education_institution']);
});

/** Start :: Health View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('health_entry', [SocietalViewController::class, 'view_health_entry'])->name('View.Health.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_health_info_list', [HealthController::class, 'get_health_info_list']);
    Route::get('/get_health_info_edit', [HealthController::class, 'get_health_info_edit']);

    // POST Method Route
    Route::post('/store_tendency_health_services', [HealthController::class, 'store_tendency_health_services']);
    Route::post('/store_health_additional_info', [HealthController::class, 'store_health_additional_info']);
    Route::post('/store_electricity_info', [HealthController::class, 'store_electricity_info']);
    Route::post('/store_diseases_ranking_frequency', [HealthController::class, 'store_diseases_ranking_frequency']);
   
});

/** Start :: Water View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('water_entry', [SocietalViewController::class, 'view_water_entry'])->name('View.Water.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_water_info_list', [WaterController::class, 'get_water_info_list']);
    Route::get('/get_water_info_edit', [WaterController::class, 'get_water_info_edit']);

    // POST Method Route
    Route::post('/store_water_info', [WaterController::class, 'store_water_info']);
    Route::post('/update_water_info', [WaterController::class, 'update_water_info']);
    Route::post('/delete_water_info', [WaterController::class, 'delete_water_info']);
});

/** Start :: Sanitation View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('sanitation_entry', [SocietalViewController::class, 'view_sanitation_entry'])->name('View.Sanitation.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_sanitation_duplicate', [SanitationController::class, 'check_duplicate_record']);
    Route::get('/get_sanitation_info_list', [SanitationController::class, 'get_sanitation_info_list']);
    Route::get('/get_sanitation_info_edit', [SanitationController::class, 'get_sanitation_info_edit']);

    // POST Method Route
    Route::post('/store_sanitation1_info', [SanitationController::class, 'store_sanitation1_info']);
    Route::post('/store_sanitation2_info', [SanitationController::class, 'store_sanitation2_info']);

    Route::post('/update_sanitation_info', [SanitationController::class, 'update_sanitation_info']);
    Route::post('/delete_sanitation_info', [SanitationController::class, 'delete_sanitation_info']);
    
});

/** Start :: Accessibility View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('accessibility_entry', [SocietalViewController::class, 'view_accessibility_entry'])->name('View.Accessibility.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_accessibility_duplicate', [AccessibilityController::class, 'check_duplicate_record']);
    Route::get('/get_accessibility_info_list', [AccessibilityController::class, 'get_accessibility_info_list']);
    Route::get('/get_accessibility_info_edit', [AccessibilityController::class, 'get_accessibility_info_edit']);

    // POST Method Route
    Route::post('/store_accessibility1_info', [AccessibilityController::class, 'store_accessibility1_info']);
    Route::post('/store_accessibility2_info', [AccessibilityController::class, 'store_accessibility2_info']);
    Route::post('/store_accessibility3_info', [AccessibilityController::class, 'store_accessibility3_info']);

    Route::post('/update_accessibility_info', [AccessibilityController::class, 'update_accessibility_info']);
    Route::post('/delete_accessibility_info', [AccessibilityController::class, 'delete_accessibility_info']);
});

/** Start :: Water Resources View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('water_resource_entry1', [WaterResourceController::class, 'water_resource_entry1'])->name('View.Water.Resources.Entry1');
    Route::get('water_resource_entry2', [WaterResourceController::class, 'water_resource_entry2'])->name('View.Water.Resources.Entry2');
    //Route::get('view_education_info', [WaterResourceController::class, 'view_education_info'])->name('View.education.Info');
    // GET Method Route 
    Route::get('/get_accessibility_info_list', [WaterResourceController::class, 'get_accessibility_info_list']);
    Route::get('/get_accessibility_info_edit', [WaterResourceController::class, 'get_accessibility_info_edit']);

    // POST Method Route
    Route::post('/store_resources_entry1', [WaterResourceController::class, 'store_resources_entry1']);
    Route::post('/store_resources_entry2', [WaterResourceController::class, 'store_resources_entry2']);

    Route::post('/update_resources_info', [WaterResourceController::class, 'update_resources_info']);
    Route::post('/delete_resources_info', [WaterResourceController::class, 'delete_resources_info']);

});

/** Start :: Livestock View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('livestock_entry', [LivestockController::class, 'livestock_entry'])->name('View.livestock.Entry');
    //Route::get('view_education_info', [WaterlivestockController::class, 'view_education_info'])->name('View.education.Info');

    // GET Method Route 
    Route::get('/get_livestock_list', [LivestockController::class, 'get_livestock_list']);
    Route::get('/get_livestock_edit', [LivestockController::class, 'get_livestock_edit']);

    // POST Method Route
    Route::post('/store_livestock_entry1', [LivestockController::class, 'store_livestock_entry1']);
    Route::post('/store_livestock_entry2', [LivestockController::class, 'store_livestock_entry2']);
    Route::post('/store_livestock_entry3', [LivestockController::class, 'store_livestock_entry3']);

    Route::post('/update_livestocks_info', [LivestockController::class, 'update_livestock_info']);
    Route::post('/delete_livestocks_info', [LivestockController::class, 'delete_livestock_info']);
});

// get all utils (global) function data 
Route::get('/get_watershedId', [UtilsController::class, 'getWatershedId']);
Route::get('/get_paraList', [UtilsController::class, 'getParaList']);
Route::get('/get_community_list', [UtilsController::class, 'get_community_list']);


Route::get('/CommunityList', [UtilsController::class, 'getCommunityList']);
Route::get('/get_training_list', [UtilsController::class, 'get_training_list']);
Route::get('/get_health_center_list', [UtilsController::class, 'get_health_center_list']);

Route::get('/get_latrine_type', [UtilsController::class, 'get_latrine_type']);
Route::get('/get_transportation', [UtilsController::class, 'get_transportation_list']);
Route::get('/get_water_source', [UtilsController::class, 'get_water_source']);

Route::get('/get_livestock_type', [UtilsController::class, 'get_livestock_type']);
Route::get('/get_farm_item', [UtilsController::class, 'get_farm_item']);