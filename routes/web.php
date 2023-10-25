<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRoleController;

use App\Http\Controllers\PopulationController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\LandController;


use App\Http\Controllers\UtilsController;


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

/** Start :: Population Usecase */
    // View Page Route 
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('population_entry', [PopulationController::class, 'population_entry'])->name('Population.Entry');
        Route::get('view_population', [PopulationController::class, 'view_population'])->name('View.Population');
    });

    // GET Method Route 
    Route::get('/get_population_list', [PopulationController::class, 'get_population_list']);
    Route::get('/get_population_details', [PopulationController::class, 'get_population_details']);

    // POST Method Route 
    Route::post('/insert_populatioin_entry', [PopulationController::class, 'insert_community_population']);
    Route::post('/update_population_details', [PopulationController::class, 'update_population_details']);
    Route::post('/delete_population', [PopulationController::class, 'delete_population']);

/** End :: Population */

/** Start :: Household View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('household_entry', [HouseholdController::class, 'view_household_entry'])->name('View.Entry.Household');
        Route::get('view_household', [HouseholdController::class, 'get_household_view'])->name('View.Household.Info');
    });

    // GET Method Route 
    Route::get('/get_household_info_list', [HouseholdController::class, 'get_household_info_list']);
    Route::get('/get_household_info_edit', [HouseholdController::class, 'get_household_info_edit']);

    // POST Method Route
    Route::post('/entry_household_info', [HouseholdController::class, 'entry_household_info']);
    Route::post('/update_household_info', [HouseholdController::class, 'update_household_info']);
    Route::post('/delete_household_info', [HouseholdController::class, 'delete_household_info']);

/** End :: Household  */

/** Start :: Land View Page Route */
    Route::group(['prefix' => '/',  'middleware' => 'User_Auth'], function(){
        Route::get('land_entry', [LandController::class, 'view_land_entry'])->name('View.Land.Entry');
        Route::get('view_land_info', [LandController::class, 'view_land_info'])->name('View.Land.Info');
    });

    // GET Method Route 
    Route::get('/get_land_info_list', [LandController::class, 'get_land_info_list']);
    Route::get('/get_land_info_edit', [LandController::class, 'get_land_info_edit']);

    // POST Method Route
    Route::post('/entry_land_info', [LandController::class, 'entry_household_info']);
    Route::post('/update_land_info', [LandController::class, 'update_household_info']);
    Route::post('/delete_land_info', [LandController::class, 'delete_household_info']);

/** End :: Household  */



// get all global function data 
Route::get('/get_watershedId', [UtilsController::class, 'getWatershedId'])->name('watershedList');
Route::get('/get_paraList', [UtilsController::class, 'getParaList'])->name('ParaList');

Route::get('/CommunityList', [UtilsController::class, 'getCommunityList'])->name('CommunityList');
Route::get('/get_medical_test', [UtilsController::class, 'getAllMedicalTest'])->name('getMedicalTest');