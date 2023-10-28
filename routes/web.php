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



// get all utils (global) function data 
Route::get('/get_watershedId', [UtilsController::class, 'getWatershedId'])->name('watershedList');
Route::get('/get_paraList', [UtilsController::class, 'getParaList'])->name('ParaList');

Route::get('/CommunityList', [UtilsController::class, 'getCommunityList'])->name('CommunityList');
Route::get('/get_medical_test', [UtilsController::class, 'getAllMedicalTest'])->name('getMedicalTest');