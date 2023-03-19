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
    Route::resource('/dashboard', 'DashboardController');

    /**
     *  ============================================
     *  |----------------- ASSET ------------------|
     *  ============================================
     */
    Route::group(['middleware' => ['can:manajemen_aset']], function() {
        Route::resource('asset', 'AssetController');
        Route::get('asset-maintenance/{id}', 'AssetController@assetMaintenance');
        Route::get('asset-component/{id}', 'ComponentTransactionController@assetComponent');

    });

    /**
     *  ============================================
     *  |----------- ASSET TRANSACTION ------------|
     *  ============================================
     */
    Route::post('asset-transaction/{asset}', 'AssetTransactionController@store');
    Route::get('status/{asset}', 'AssetTransactionController@statusType');
    Route::get('asset-transaction/{id}/show', 'AssetTransactionController@assetTransaction');
    Route::get('asset-activity', 'AssetTransactionController@assetActivity');

    /**
     *  ============================================
     *  |----------------- COMPONENT --------------|
     *  ============================================
     */
    Route::resource('component', 'ComponentController')->middleware('can:manajemen_komponen');

    /**
     *  ============================================
     *  |---------- COMPONENT TRANSACTION ---------|
     *  ============================================
     */
    Route::post('component-transaction/{component}', 'ComponentTransactionController@store')->name('component-transaction.store');
    Route::get('component-transaction/{component}', 'ComponentTransactionController@statusType');
    Route::get('component-transaction/{component}/show', 'ComponentTransactionController@componentTransaction');
    Route::get('checkin-component/{transaction}', 'ComponentTransactionController@showCheckin')->name('checkin-component.show');
    Route::post('checkin-component/{transaction}', 'ComponentTransactionController@checkin')->name('checkin-component.store');
    Route::get('component-activity', 'ComponentTransactionController@componentActivity');

    /**
     *  ============================================
     *  |------------------- FILES ----------------|
     *  ============================================
     */
    Route::get('files', 'FileController@getFile')->name('files.api');
    Route::post('files', 'FileController@store')->name('files.store');
    Route::get('files/download/{file}', 'FileController@download')->name('files.download');
    Route::delete('files/{file}', 'FileController@destroy')->name('files.destroy');

    /**
     *  ============================================
     *  |---------------- DEPRECIATION ------------|
     *  ============================================
     */
    Route::group(['middleware' => ['can: manajemen_depresiasi']], function() {
        Route::resource('depreciations', 'DepreciationController')->except('show');
        Route::get('depreciations/type/{type}', 'DepreciationController@getCategory');
        Route::get('depreciations/data/accumulation', 'DepreciationController@dataList');
    });

    /**
     *  ============================================
     *  |---------------- ASSET TYPE --------------|
     *  ============================================
     */
    Route::resource('maintenance', 'MaintenanceController')->middleware('can:manajemen_pemeliharaan');

    /**
     *  ============================================
     *  |---------------- ASSET TYPE --------------|
     *  ============================================
     */
    Route::resource('asset-type', 'AssetTypeController')->middleware('can:manajemen_tipe_aset');

    /**
     *  ============================================
     *  |------------------ BRAND -----------------|
     *  ============================================
     */
    Route::resource('brand', 'BrandController')->middleware('can:manajemen_merek');

    /**
     *  ============================================
     *  |----------------- LOCATION ---------------|
     *  ============================================
     */
    Route::resource('location', 'LocationController')->middleware('can:manajemen_lokasi');

    /**
     *  ============================================
     *  |---------------- DEPARTMENT --------------|
     *  ============================================
     */
    Route::resource('department', 'DepartmentController')->middleware('can:manajemen_departemen');

    /**
     *  ============================================
     *  |----------------- SUPPLIER ---------------|
     *  ============================================
     */
    Route::resource('supplier', 'SupplierController')->middleware('can:manajemen_pemasok');

    /**
     *  ============================================
     *  |----------------- EMPLOYEE ---------------|
     *  ============================================
     */
    Route::resource('employee', 'EmployeeController')->middleware('can:manajemen_karyawan');

    /**
     *  ============================================
     *  |----------------- SETTING ----------------|
     *  ============================================
     */

    Route::group(['prefix' => 'settings', 'middleware' => ['can:manajemen_setting']], function() {
        Route::get('/', 'SettingController@index')->name('settings.index');

        Route::get('roles', 'SettingController@listRole')->name('settings.list-role');
        Route::post('add-role', 'SettingController@addRole')->name('settings.add-role');
        Route::get('edit-role/{id}', 'SettingController@editRole')->name('settings.edit-role');
        Route::patch('update-role/{role}', 'SettingController@updateRole')->name('settings.update-role');
        Route::delete('delete-role/{role}', 'SettingController@deleteRole')->name('settings.delete-role');

        Route::get('permissions', 'SettingController@listPermission')->name('settings.list-permission');
        Route::post('add-permission', 'SettingController@addPermission')->name('settings.add-permission');
        Route::get('edit-permission/{permission}', 'SettingController@editPermission')->name('settings.edit-permission');
        Route::patch('update-permission/{permission}', 'SettingController@updatePermission')->name('settings.update-permission');
        Route::delete('delete-permission/{permission}', 'SettingController@deletePermission')->name('settings.delete-permission');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
