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

Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard.dashboard.index');

    Route::resource('asset', 'AssetController');
    Route::resource('asset-type', 'AssetTypeController');
    Route::resource('brand', 'BrandController');
    Route::resource('location', 'LocationController');
    Route::resource('department', 'DepartmentController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('employee', 'EmployeeController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
