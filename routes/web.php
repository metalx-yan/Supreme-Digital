<?php

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



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {
    
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('users', 'UserController');
    Route::resource('maintenances', 'MaintenanceController');
    Route::resource('reports', 'ReportController');
});
Route::match(['put', 'patch'], '/sendto/{id}','MaintenanceController@updateda')->name('maintenances.updateda');
Route::put('/approve/{id}','MaintenanceController@updateapprove')->name('maintenances.updateapprove');

Route::group(['prefix' => 'itsupport', 'middleware' => ['auth', 'role:itsupport']], function() {

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('maintenances', 'MaintenanceController', ['names' => 'itsupportmaintenances']);
    Route::resource('reports', 'ReportController', ['names' => 'itsupportreports']);

   
});

Route::group(['prefix' => 'direktur', 'middleware' => ['auth', 'role:direktur']], function() {

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('maintenances', 'MaintenanceController', ['names' => 'direkturmaintenances']);
    Route::resource('reports', 'ReportController', ['names' => 'direkturreports']);
});


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



