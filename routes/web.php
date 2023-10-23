<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\AdmitController;  
use App\Http\Controllers\ChartofAccountController;
use App\Http\Controllers\LedgerViewController;
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

    Route::get('chartof_accounts', [ChartofAccountController::class, 'view_chartofAccounts'])->name('chartofAccounts');
}); 

Route::group(['prefix' => '/',  'middleware' => 'entry_auth'], function(){
    Route::get('population_entry', [PopulationController::class, 'population_entry'])->name('Population.Entry');
    Route::post('InsertCommunityPopulation', [PopulationController::class, 'insert_community_population'])
           ->name('InsertPopulation');
    Route::get('admit_entry', [AdmitController::class, 'view_admitEntry'])->name('admitEntry');
});

Route::get('view_population', [PopulationController::class, 'view_population'])->name('View.Population');
Route::get('/get_population_list', [PopulationController::class, 'get_population_list'])->name('View.Population.List');
Route::get('/get_population_details', [PopulationController::class, 'get_population_details'])->name('Get.Population.Details');
Route::post('/update_population_details', [PopulationController::class, 'update_population_details'])->name('Update.Population.Details');
Route::post('/delete_population', [PopulationController::class, 'delete_population'])->name('Delete.Population');


// internal usecase get data function
Route::get('/receipt_check_print', [ReceiptController::class, 'view_receiptCheckPrint'])->name('ReceiptCheckPrint');
Route::get('/getReceipt_list', [ReceiptController::class, 'get_receipt_list'])->name('getReceiptList');
Route::get('/getPatient_detls', [ReceiptController::class, 'get_patient_detls'])->name('getPatient_detls');



// get all global function data 
Route::get('/get_watershedId', [UtilsController::class, 'getWatershedId'])->name('watershedList');
Route::get('/get_paraList', [UtilsController::class, 'getParaList'])->name('ParaList');

Route::get('/CommunityList', [UtilsController::class, 'getCommunityList'])->name('CommunityList');
Route::get('/get_medical_test', [UtilsController::class, 'getAllMedicalTest'])->name('getMedicalTest');