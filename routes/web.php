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
use App\Http\Controllers\Societal\EducationController;
use App\Http\Controllers\Societal\HealthController;
use App\Http\Controllers\Societal\WaterController;

use App\Http\Controllers\UtilsController;

// ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

Route::get('/', [HomeController::class, 'view_dashboard'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'view_dashboard'])->name('dashboard');

Route::get('/login', [HomeController::class, 'view_login'])->name('login');
Route::post('/get_login', [AuthController::class, 'get_login'])->name('get.login');

Route::get('/register', [HomeController::class, 'view_register'])->name('register');
Route::post('/get_register', [AuthController::class, 'store'])->name('get.register');

Route::post('/logout', [AuthController::class, 'get_logout'])->name('logout');

Route::group(['prefix' => '/',  'middleware' => 'admin_auth'], function(){
    Route::get('user_panel', [HomeController::class, 'view_userPanel'])->name('userPanel');
    Route::get('user_role', [UserRoleController::class, 'get_userRole'])->name('user_role');
    Route::post('updt_role', [UserRoleController::class, 'updt_userRole'])->name('updt_role');
    Route::post('delte_role', [UserRoleController::class, 'delte_userRole'])->name('delte_role');
}); 

/** Start :: Population View Page */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('population_entry', [SocietalViewController::class, 'population_entry'])->name('Population.Entry');
        Route::get('view_population', [SocietalViewController::class, 'view_population'])->name('View.Population');
    });

    // GET Method Route 
    Route::get('/get_population_list', [PopulationController::class, 'get_population_list']);
    Route::get('/get_population_details', [PopulationController::class, 'get_population_details']);

    // POST Method Route 
    Route::post('/insert_populatioin_entry', [PopulationController::class, 'insert_community_population']);
    Route::post('/update_population_details', [PopulationController::class, 'update_population_details']);
    Route::post('/delete_population', [PopulationController::class, 'delete_population']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Household View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('household_entry', [SocietalViewController::class, 'view_household_entry'])->name('View.Entry.Household');
        Route::get('view_household', [SocietalViewController::class, 'get_household_view'])->name('View.Household.Info');
    });

    // GET Method Route 
    Route::get('/get_household_info_list', [HouseholdController::class, 'get_household_info_list']);
    Route::get('/get_household_info_edit', [HouseholdController::class, 'get_household_info_edit']);

    // POST Method Route
    Route::post('/entry_household_info', [HouseholdController::class, 'store_household_info']);
    Route::post('/update_household_info', [HouseholdController::class, 'update_household_info']);
    Route::post('/delete_household_info', [HouseholdController::class, 'delete_household_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Land View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('land_entry', [SocietalViewController::class, 'view_land_entry'])->name('View.Land.Entry');
        Route::get('view_land_info', [SocietalViewController::class, 'view_land_info'])->name('View.Land.Info');
    });

    // GET Method Route 
    Route::get('/get_land_info_list', [LandController::class, 'get_land_info_list']);
    Route::get('/get_land_info_edit', [LandController::class, 'get_land_info_edit']);

    // POST Method Route
    Route::post('/store_land_info', [LandController::class, 'store_land_info']);
    Route::post('/update_land_info', [LandController::class, 'update_land_info']);
    Route::post('/delete_land_info', [LandController::class, 'delete_land_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Occupation View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('occupation_entry', [SocietalViewController::class, 'view_occupation_entry'])->name('View.Occupation.Entry');
        //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    });

    // GET Method Route 
    Route::get('/get_occupation_info_list', [OccupationController::class, 'get_occupation_info_list']);
    Route::get('/get_occupation_info_edit', [OccupationController::class, 'get_occupation_info_edit']);

    // POST Method Route
    Route::post('/store_occupation_info', [OccupationController::class, 'store_occupation_info']);
    Route::post('/update_occupation_info', [OccupationController::class, 'update_occupation_info']);
    Route::post('/delete_occupation_info', [OccupationController::class, 'delete_occupation_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Livelihood View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('livelihood_entry', [SocietalViewController::class, 'view_livelihood_entry'])->name('View.Livelihood.Entry');
        //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    });

    // GET Method Route
    Route::get('/check_livelihood_duplicate', [LivelihoodController::class, 'check_duplicate_record']); 
    Route::get('/get_livelihood_info_list', [LivelihoodController::class, 'get_livelihood_info_list']);
    Route::get('/get_livelihood_info_edit', [LivelihoodController::class, 'get_livelihood_info_edit']);

    // POST Method Route
    Route::post('/store_livelihood_info', [LivelihoodController::class, 'store_livelihood_info']);
    Route::post('/update_livelihood_info', [LivelihoodController::class, 'update_livelihood_info']);
    Route::post('/delete_livelihood_info', [LivelihoodController::class, 'delete_livelihood_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Income View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('income_entry', [SocietalViewController::class, 'view_income_entry'])->name('View.Income.Entry');
        //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    });

    // GET Method Route 
    Route::get('/get_income_info_list', [IncomeController::class, 'get_income_info_list']);
    Route::get('/get_income_info_edit', [IncomeController::class, 'get_income_info_edit']);

    // POST Method Route
    Route::post('/store_income_info', [IncomeController::class, 'store_income_info']);
    Route::post('/update_income_info', [IncomeController::class, 'update_income_info']);
    Route::post('/delete_income_info', [IncomeController::class, 'delete_income_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Expenditure View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('expenditure_entry', [SocietalViewController::class, 'view_expenditure_entry'])->name('View.Expenditure.Entry');
        //Route::get('view_occupation_info', [SocietalViewController::class, 'view_occupation_info'])->name('View.Occupation.Info');
    });

    // GET Method Route 
    Route::get('/get_expenditure_info_list', [ExpenditureController::class, 'get_expenditure_info_list']);
    Route::get('/get_expenditure_info_edit', [ExpenditureController::class, 'get_expenditure_info_edit']);

    // POST Method Route
    Route::post('/store_expenditure_info', [ExpenditureController::class, 'store_expenditure_info']);
    Route::post('/update_expenditure_info', [ExpenditureController::class, 'update_expenditure_info']);
    Route::post('/delete_expenditure_info', [ExpenditureController::class, 'delete_expenditure_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Economic View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('economic_entry', [SocietalViewController::class, 'view_economic_entry'])->name('View.Economic.Entry');
        //Route::get('view_economic_info', [SocietalViewController::class, 'view_economic_info'])->name('View.Economic.Info');
    });

    // GET Method Route 
    Route::get('/get_economic_info_list', [EconomicController::class, 'get_economic_info_list']);
    Route::get('/get_economic_info_edit', [EconomicController::class, 'get_economic_info_edit']);

    // POST Method Route
    Route::post('/store_economic_info', [EconomicController::class, 'store_economic_info']);
    Route::post('/update_economic_info', [EconomicController::class, 'update_economic_info']);
    Route::post('/delete_economic_info', [EconomicController::class, 'delete_economic_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Education View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('education_part1_entry', [SocietalViewController::class, 'view_education_part1_entry'])->name('View.EducationPart1.Entry');
        Route::get('education_part2_entry', [SocietalViewController::class, 'view_education_part2_entry'])->name('View.EducationPart2.Entry');
        //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    });

    // GET Method Route 
    Route::get('/get_education_info_list', [EducationController::class, 'get_education_info_list']);
    Route::get('/get_education_info_edit', [EducationController::class, 'get_education_info_edit']);

    // POST Method Route
    Route::post('/store_education_part1_info', [EducationController::class, 'store_education_part1_info']);
    Route::post('/update_education_info', [EducationController::class, 'update_education_info']);
    Route::post('/delete_education_info', [EducationController::class, 'delete_education_info']);

    Route::post('/store_education_part2_info', [EducationController::class, 'store_education_part2_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Health View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('health_entry', [SocietalViewController::class, 'view_health_entry'])->name('View.Health.Entry');
        //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    });

    // GET Method Route 
    Route::get('/get_health_info_list', [HealthController::class, 'get_health_info_list']);
    Route::get('/get_health_info_edit', [HealthController::class, 'get_health_info_edit']);

    // POST Method Route
    Route::post('/store_health_info', [HealthController::class, 'store_health_info']);
    Route::post('/update_health_info', [HealthController::class, 'update_health_info']);
    Route::post('/delete_health_info', [HealthController::class, 'delete_health_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Water View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('water_entry', [SocietalViewController::class, 'view_water_entry'])->name('View.Water.Entry');
        //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
    });

    // GET Method Route 
    Route::get('/get_water_duplicate', [WaterController::class, 'check_duplicate_record']);
    Route::get('/get_water_info_list', [WaterController::class, 'get_water_info_list']);
    Route::get('/get_water_info_edit', [WaterController::class, 'get_water_info_edit']);

    // POST Method Route
    Route::post('/store_water_info', [WaterController::class, 'store_water_info']);
    Route::post('/update_water_info', [WaterController::class, 'update_water_info']);
    Route::post('/delete_water_info', [WaterController::class, 'delete_water_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Sanitation View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('sanitation_entry', [SocietalViewController::class, 'view_sanitation_entry'])->name('View.Sanitation.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
});

// GET Method Route 
Route::get('/get_sanitation_duplicate', [SanitationController::class, 'check_duplicate_record']);
Route::get('/get_sanitation_info_list', [SanitationController::class, 'get_sanitation_info_list']);
Route::get('/get_sanitation_info_edit', [SanitationController::class, 'get_sanitation_info_edit']);

// POST Method Route
Route::post('/store_sanitation_info', [SanitationController::class, 'store_sanitation_info']);
Route::post('/update_sanitation_info', [SanitationController::class, 'update_sanitation_info']);
Route::post('/delete_sanitation_info', [SanitationController::class, 'delete_sanitation_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========

/** Start :: Accessibility View Page Route */
Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
    Route::get('accessibility_entry', [SocietalViewController::class, 'view_accessibility_entry'])->name('View.Accessibility.Entry');
    //Route::get('view_education_info', [SocietalViewController::class, 'view_education_info'])->name('View.education.Info');
});

// GET Method Route 
Route::get('/get_accessibility_duplicate', [AccessibilityController::class, 'check_duplicate_record']);
Route::get('/get_accessibility_info_list', [AccessibilityController::class, 'get_accessibility_info_list']);
Route::get('/get_accessibility_info_edit', [AccessibilityController::class, 'get_accessibility_info_edit']);

// POST Method Route
Route::post('/store_accessibility_info', [AccessibilityController::class, 'store_accessibility_info']);
Route::post('/update_accessibility_info', [AccessibilityController::class, 'update_accessibility_info']);
Route::post('/delete_accessibility_info', [AccessibilityController::class, 'delete_accessibility_info']);

// End :: ========== * ========= * ========= * ======== * ========= * ========== * ========== * ==========


// get all utils (global) function data 
Route::get('/get_watershedId', [UtilsController::class, 'getWatershedId']);
Route::get('/get_paraList', [UtilsController::class, 'getParaList']);
Route::get('/get_community_list', [UtilsController::class, 'get_community_list']);


Route::get('/CommunityList', [UtilsController::class, 'getCommunityList']);
Route::get('/get_training_list', [UtilsController::class, 'get_training_list']);
Route::get('/get_health_center_list', [UtilsController::class, 'get_health_center_list']);
Route::get('/get_latrine_type', [UtilsController::class, 'get_latrine_type']);
Route::get('/get_transportation', [UtilsController::class, 'get_transportation_list']);