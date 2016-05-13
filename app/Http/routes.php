<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::get('/home', 'Controller@index');
Route::get('/debitur', 'Controller@showdebitur');
Route::get('/debitur-new', 'Controller@showdebiturnew');
// Route::get('/debitur-new/{id}', 'Controller@showdebiturforecast');
Route::get('/debitur-new/{id}/updateyes', 'Controller@updateapproved');
Route::get('/debitur-new/{id}/updateno', 'Controller@updateapproved2');
Route::post('pages/debitur', 'Controller@storedebitur');
Route::get('/pages/debitur/{id}','Controller@deletedebitur');
Route::get('/debitur-new/{id}','Controller@forecastdebitur');
Route::get('/insert', 'Controller@insertdata');
