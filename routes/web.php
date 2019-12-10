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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

#disable register route ie get and post route
Auth::routes();

Route::any('/register', function() {
    return redirect()->route('welcome');
});
Route::post('/post-records', 'PublicFormController@store')->name('post-record');

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user-records', 'UserFormController');    
    Route::get('/export-excel', 'UserFormController@export_excel')->name('export-excel');
});


