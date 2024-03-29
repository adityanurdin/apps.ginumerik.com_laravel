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
Route::group(['prefix' => 'installations'], function() {
    Route::get('/{steps}', 'Installations@index')->name('installations.index');
    Route::post('/{steps}', 'Installations@store')->name('installations.store');
});

Route::group(['middleware' => 'SETUP'], function() {
    
    Route::get('/' , function() {  return redirect()->route('dashboard.index'); });
    
    /**
     * ======================
     * Authentication Routing
     * - Login
     * - Register
     * - Logout
     * ======================
     */
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login' , 'Auth\AuthController@loginPage')->name('login');
        Route::post('login', 'Auth\AuthController@login')->name('login');
        
        Route::get('register' , 'Auth\AuthController@registerPage')->name('register');
        Route::post('register' , 'Auth\AuthController@register')->name('register');

        Route::get('lupa-password', 'Auth\AuthController@lupas')->name('lupas');
        Route::post('lupa-password', 'Auth\AuthController@goLupas')->name('lupas');
    });
    
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');
    
    /**
     * =====================
     * Dashboard Admin Routing
     * - Dashboard
     * - Users
     * - Administrasi
     *   - Input
     *   - Customers
     * - Finance
     * - Teknis
     * =====================
     */
    
    Route::group(['middleware' => 'auth'], function() {
        // Dashboard
        Route::resource('dashboard', 'Dashboard\DashboardController');
        Route::post('search', 'Dashboard\SearchController@search')->name('search');

        // Account Info
        Route::get('account-info', 'Dashboard\DashboardController@account')->name('account-info');
        Route::put('account-info', 'Dashboard\DashboardController@updateAccount')->name('account-info');

    
        Route::group(['middleware' => 'Admin'], function() {

            // Users
            Route::get('users/data' , 'Dashboard\UserController@data')->name('user.data');
            Route::get('users/{id}/delete/', 'Dashboard\UserController@destroy')->name('user.destroy');
            Route::resource('users', 'Dashboard\UserController')->except(['destroy']);

        
            // Settings
            Route::resource('settings', 'Dashboard\SettingController');
            
            //Report
            Route::group(['prefix' => 'system-reports'], function() {
                Route::get('/', 'Dashboard\SystemReportController@index')->name('system-report.index');
                Route::post('/', 'Dashboard\SystemReportController@export')->name('system-report.export');
            });

            
        });

        // Master Data
        Route::resource('labs', 'LabController')->except(['view']);
        //Tools Panel
        Route::get('tools-panel/recalculate', 'Dashboard\ToolsPanelController@recalculate')->name('tools-panel.recalculate');
        Route::get('tools-panel/lag-checking', 'Dashboard\ToolsPanelController@lagChecking')->name('tools-panel.lag-checking');
        Route::resource('tools-panel', 'Dashboard\ToolsPanelController')->only(['index']);

        // Route Khusus
        Route::get('administrasi/transfer-of-doc/{id}/show', 'Dashboard\AdministrasiController@showTD')->name('administrasi.show.tod');
        Route::post('administrasi/transfer-of-doc/{id}', 'Dashboard\AdministrasiController@storeTD')->name('administrasi.store.tod');
        Route::get('administrasi/transfer-of-doc/{id}/destroy', 'Dashboard\AdministrasiController@destroyTD')->name('administrasi.destroy.tod');
        Route::get('teknis/checked/{check}/{id}/{order_id}', 'Dashboard\TeknisController@checked')->name('teknis.checked');
    
        Route::group(['prefix' => 'system'], function() {
            Route::get('recalculate-grandtotal/{no_order}', 'Dashboard\AdministrasiController@recalculate')->name('system.recalculate');
        });


        
        // Administrasi
        Route::group(['middleware' => 'ADM'], function() {

            // Route::get('administrasi/lacak', 'Dashboard\AdministrasiController@lacak')->name('administrasi.lacak');
            // Route::post('administrasi/lacak', 'Dashboard\AdministrasiController@letsLacak')->name('administrasi.lacak');

            Route::get('administrasi/lag', 'Dashboard\AdministrasiController@lag')->name('administrasi.lag');

            Route::get('administrasi/transfer-of-doc', 'Dashboard\AdministrasiController@indexTD')->name('administrasi.tod');
            // Route::get('administrasi/transfer-of-doc/{id}/show', 'Dashboard\AdministrasiController@showTD')->name('administrasi.show.tod');
            // Route::post('administrasi/transfer-of-doc/{id}', 'Dashboard\AdministrasiController@storeTD')->name('administrasi.store.tod');
            // Route::get('administrasi/transfer-of-doc/{id}/destroy', 'Dashboard\AdministrasiController@destroyTD')->name('administrasi.destroy.tod');
            Route::get('administrasi/transfer-of-doc/data', 'Dashboard\AdministrasiController@dataTD')->name('administrasi.data.tod');
            
            Route::post('administrasi/serahterima/{id}', 'Dashboard\AdministrasiController@serahterima')->name('administrasi.serahterima');
            Route::get('administrasi/sertifikat', 'Dashboard\AdministrasiController@sertifikat')->name('administrasi.sertifikat');
            
            Route::post('administrasi/update-status-order', 'Dashboard\AdministrasiController@update_status_order')->name('administrasi.update_status_order');
            Route::get('administrasi/force-as/{id}/{order_id}', 'Dashboard\AdministrasiController@forceAS')->name('administrasi.force-as');
            Route::get('administrasi/data', 'Dashboard\AdministrasiController@data')->name('administrasi.data');
            Route::get('administrasi/{id}/detail', 'Dashboard\AdministrasiController@show')->name('administrasi.show');
            Route::post('administrasi/wizard/{next}', 'Dashboard\AdministrasiController@storeWizard')->name('administrasi.wizard');
            Route::get('administrasi/create/{wizardID}', 'Dashboard\AdministrasiController@createWizard')->name('administrasi.create-wizard');
            Route::get('administrasi/{id}/delete', 'Dashboard\AdministrasiController@destroy')->name('administrasi.destroy');
            Route::resource('administrasi', 'Dashboard\AdministrasiController')->except(['show', 'destroy']);
    
            Route::group(['prefix' => 'administrasi'], function() {
    
                //Barang
                Route::get('{order_id}/barang/{id}/serahkan/{item}', 'Dashboard\BarangController@serah_barang')->name('serah.barang');
                Route::get('{order_id}/barang/{id}/edit', 'Dashboard\BarangController@edit')->name('barang.edit');
                Route::get('{order_id}/barang/{id}/delete', 'Dashboard\BarangController@destroy')->name('barang.destroy');
                Route::post('{order_id}/barang/store', 'Dashboard\BarangController@store')->name('barang.store');
                Route::get('{order_id}/barang/create', 'Dashboard\BarangController@create')->name('barang.create');
                Route::resource('barang', 'Dashboard\BarangController')->only(['index', 'update']);
    
                // Customer
                Route::get('customer/data', 'Dashboard\CustomerController@data')->name('customer.data');
                Route::get('customer/{id}/delete/', 'Dashboard\CustomerController@destroy')->name('customer.destroy');
                Route::resource('customer' , 'Dashboard\CustomerController')->except(['destroy']);

                // Sub Con
                Route::get('sub-con', 'Dashboard\AdministrasiController@subcon')->name('subcon');
                Route::get('sub-con/data/{subcon?}', 'Dashboard\AdministrasiController@subconData')->name('subcon.data');

                // Statistik
                Route::get('statistic/{param}', 'Dashboard\DashboardController@statistic')->name('statistic');

                
            });
        });
    
        // Finance
        Route::group(['middleware' => 'Finance'], function() {

            // Route::post('finance/{finance}/check_alat', 'Dashboard\FinanceController@checkAlat')->name('finance.checkalat');

            Route::get('finance/menu/{menu}', 'Dashboard\FinanceController@menu')->name('finance.menu');
            Route::get('finance/menu/{menu}/data', 'Dashboard\FinanceController@data_menu')->name('finance.data_menu');

            Route::get('finance/input', 'Dashboard\AdministrasiController@inputIndex')->name('administrasi.input');
            Route::get('finance/input/{id}', 'Dashboard\AdministrasiController@showInput')->name('administrasi.show.input');
            Route::get('finance/data-input', 'Dashboard\AdministrasiController@dataInput')->name('administrasi.data.input');

            Route::get('finance/data/{status}', 'Dashboard\FinanceController@data')->name('finance.data');
            Route::get('finance/{finance}/cancel', 'Dashboard\FinanceController@cancelHistory')->name('finance.cancel');
            Route::get('finance/{finance}/invoice', 'Dashboard\FinanceController@edit')->name('finance.edit');
            Route::put('finance/{finance}/edit/pembayaran', 'Dashboard\FinanceController@prosesEditPembayaran')->name('finance.do.editPembayaran');
            Route::get('finance/{finance}/edit/pembayaran', 'Dashboard\FinanceController@editPembayaran')->name('finance.editPembayaran');
            Route::put('finance/{id}/pembayaran', 'Dashboard\FinanceController@ProsesBayar')->name('finance.bayar');

            Route::get('finance/pembayaran-selesai', 'Dashboard\FinanceController@pembayaranSelesai')->name('finance.selesai');
            Route::get('finance/pembayaran-selesai/data', 'Dashboard\FinanceController@dataSelesai')->name('finance.selesai.data');
            Route::get('finance/pembayaran-batal', 'Dashboard\FinanceController@pembayaranBatal')->name('finance.batal');
            Route::get('finance/pembayaran-batal/data', 'Dashboard\FinanceController@dataBatal')->name('finance.batal.data');
            Route::resource('finance', 'Dashboard\FinanceController')->except(['edit']);
        });

        Route::get('teknis/summary', 'Dashboard\TeknisController@summary')->name('teknis.summary');
        // Route::get('teknis/summary', 'Dashboard\TeknisController@summary')->name('teknis.summary')->middleware('Admin');
        // Route::get('teknis/summary/{id}/detail', 'Dashboard\TeknisController@summary_detail')->name('teknis.summary.detail')->middleware('Admin');
        Route::get('teknis/summary/{id}/detail', 'Dashboard\TeknisController@summary_detail')->name('teknis.summary.detail');

        Route::get('administrasi/lacak', 'Dashboard\AdministrasiController@lacak')->name('administrasi.lacak');
        Route::post('administrasi/lacak', 'Dashboard\AdministrasiController@letsLacak')->name('administrasi.lacak');

        // Teknis
        Route::group(['middleware' => 'Teknis'], function() {

            Route::get('teknis/sertifikat', 'Dashboard\SertifikatController@index')->name('sertifikat.index');
            Route::get('teknis/sertifikat/{id}/{order_id}/show', 'Dashboard\SertifikatController@show')->name('sertifikat.show');
            Route::post('teknis/sertifikat/upload', 'Dashboard\SertifikatController@upload')->name('sertifikat.upload');
            Route::get('teknis/sertifikat/{id}/download', 'Dashboard\SertifikatController@download')->name('sertifikat.download');

            Route::post('teknis/serahterima/{id}', 'Dashboard\TeknisController@serahterima')->name('teknis.serahterima');
            Route::get('teknis/data', 'Dashboard\TeknisController@data')->name('teknis.data');
            Route::resource('teknis', 'Dashboard\TeknisController')->except(['destroy']);
        });


        // PRINT Routing
        Route::get('print-form-adm-2/{id}', 'PrintController@formAdm2')->name('print.form-adm-2');
        Route::get('print-form-adm-1/{id}', 'PrintController@formAdm1')->name('print.form-adm-1');

        Route::get('print-transfer-of-doc/{id}', 'PrintController@TodPrint')->name('print.tod');

        Route::get('print-invoice/{id}/{type}', function($id, $type) {
            if($type != 'invoice' && $type != 'kwitansi') {
                abort('404');
            }
            return view('admin.finance.print', compact('id', 'type'));
        })->name('print');

        Route::post('print-invoice/{id}', 'PrintController@invoice')->name('print.invoice');
        Route::post('print-kwitansi/{id}', 'PrintController@kwitansi')->name('print.kwitansi');

        Route::get('print-fr-tk-1/{id}', 'PrintController@formTk1')->name('print.form-tk-1');

        Route::get('print-input/{id}', 'PrintController@input')->name('print.input');

        // Archived Routing
        Route::get('archive/tahun/{year}', 'Dashboard\ArchivedController@index')->name('archived.index');
        Route::get('archive/tahun/{year}/data/{section}', 'Dashboard\ArchivedController@data')->name('archived.data');
    });
    
    /**
     * =====================
     * Additional Config Routing
     * - JS
     * - Logs
     * - System-log
     * =====================
     */
    Route::name('js.')->group(function() {
        Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
    });
    
    Route::group(['middleware' => ['Admin', 'auth']], function() {

        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

        Route::get('system-log/data', 'LogController@data')->name('system-log.data');
        Route::resource('system-log', 'LogController')->only(['index', 'store']);

        Route::get('pendapatan/{all}', 'Dashboard\FinanceController@pendapatan')->name('pendapatan.all');
        Route::get('pendapatan', 'Dashboard\FinanceController@pendapatan')->name('pendapatan');
        Route::post('pendapatan', 'Dashboard\FinanceController@pendapatan')->name('pendapatan');
    });

});

/**
 * Testing Routing
 */
Route::group(['prefix' => 'test'], function() {

    Route::get('form-adm-2', function() {
        return view('test.form-adm-2');
    });
    Route::get('kwitansi', function() {
        return view('test.kwitansi');
    });

}); 

