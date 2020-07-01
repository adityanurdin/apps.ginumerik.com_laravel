<?php

/**
 * Welcome to Labs Litecloud.id, Develop your project into The Labs
 * 
 * Start Date : 23/06/2020 22:01
 * Developer  : Muhammad Aditya Nurdin
 * Link       : https://labs.litecloud.id
 * Project    : Internal App for PT. Gaya Instrumentasi Numerik
 */

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

Route::get('/' , function() {  return redirect()->route('dashboard.index'); });

/**
 * ======================
 * Authentication Routing
 * - Login
 * - Register
 * - Logout
 * ======================
 */
Route::get('login' , 'Auth\AuthController@loginPage')->name('login');
Route::post('login', 'Auth\AuthController@login')->name('login');

Route::get('register' , 'Auth\AuthController@registerPage')->name('register');
Route::post('register' , 'Auth\AuthController@register')->name('register');

Route::get('logout', 'Auth\AuthController@logout')->name('logout');

/**
 * =====================
 * Dashboard Admin Routing
 * - Dashboard
 * - Users
 * - Administrasi
 *   - Customers
 * - Finance
 * =====================
 */

Route::group(['middleware' => 'auth'], function() {
    // Dashboard
    Route::resource('dashboard', 'Dashboard\DashboardController');

    // Users
    Route::get('users/data' , 'Dashboard\UserController@data')->name('user.data');
    Route::get('users/{id}/delete/', 'Dashboard\UserController@destroy')->name('user.destroy');
    Route::resource('users', 'Dashboard\UserController')->except(['destroy']);

    // Administrasi
    Route::group(['middleware' => 'ADM'], function() {
        
        Route::get('administrasi/data', 'Dashboard\AdministrasiController@data')->name('administrasi.data');
        Route::get('administrasi/{id}/show', 'Dashboard\AdministrasiController@show')->name('administrasi.show');
        Route::post('administrasi/wizard/{next}', 'Dashboard\AdministrasiController@storeWizard')->name('administrasi.wizard');
        Route::get('administrasi/create/{wizardID}', 'Dashboard\AdministrasiController@createWizard')->name('administrasi.create-wizard');
        Route::resource('administrasi', 'Dashboard\AdministrasiController')->except(['show', 'destroy']);

        Route::group(['prefix' => 'administrasi'], function() {
            // Customer
            Route::get('customer/data', 'Dashboard\CustomerController@data')->name('customer.data');
            Route::get('customer/{id}/delete/', 'Dashboard\CustomerController@destroy')->name('customer.destroy');
            Route::resource('customer' , 'Dashboard\CustomerController')->except(['destroy']);
        });
    });

    // Finance
    Route::group(['middleware' => 'Finance'], function() {
        Route::resource('finance', 'Dashboard\FinanceController');
    });
});

/**
 * =====================
 * Additional Config Routing
 * - JS
 * - Logs
 * =====================
 */
Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs')->middleware('auth');
