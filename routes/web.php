<?php

use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'auth.login')->middleware('guest');
Route::view('/welcome', 'welcome');

Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard.dashboard.index');

    /**
     *  ============================================
     *  |----------------- ASSET ------------------|
     *  ============================================
     */
    Route::resource('asset', 'AssetController');
    Route::get('asset-maintenance/{id}', 'AssetController@assetMaintenance');

    /**
     *  ============================================
     *  |----------- ASSET TRANSACTION ------------|
     *  ============================================
     */
    Route::post('asset-transaction/{asset}', 'AssetTransactionController@store');
    Route::get('status/{asset}', 'AssetTransactionController@statusType');
    Route::get('asset-transaction/{id}/show', 'AssetTransactionController@assetTransaction');

    /**
     *  ============================================
     *  |----------------- COMPONENT --------------|
     *  ============================================
     */
    Route::resource('component', 'ComponentController');

    /**
     *  ============================================
     *  |---------- COMPONENT TRANSACTION ---------|
     *  ============================================
     */
    Route::post('component-transaction/{component}', 'ComponentTransactionController@store');
    Route::get('component-transaction/{component}', 'ComponentTransactionController@statusType');
    Route::get('asset-component/{id}', 'ComponentTransactionController@assetComponent');

    /**
     *  ============================================
     *  |---------------- ASSET TYPE --------------|
     *  ============================================
     */
    Route::resource('maintenance', 'MaintenanceController');


    /**
     *  ============================================
     *  |---------------- ASSET TYPE --------------|
     *  ============================================
     */
    Route::resource('asset-type', 'AssetTypeController');

    /**
     *  ============================================
     *  |------------------ BRAND -----------------|
     *  ============================================
     */
    Route::resource('brand', 'BrandController');

    /**
     *  ============================================
     *  |----------------- LOCATION ---------------|
     *  ============================================
     */
    Route::resource('location', 'LocationController');

    /**
     *  ============================================
     *  |---------------- DEPARTMENT --------------|
     *  ============================================
     */
    Route::resource('department', 'DepartmentController');

    /**
     *  ============================================
     *  |----------------- SUPPLIER ---------------|
     *  ============================================
     */
    Route::resource('supplier', 'SupplierController');

    /**
     *  ============================================
     *  |----------------- EMPLOYEE ---------------|
     *  ============================================
     */
    Route::resource('employee', 'EmployeeController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
