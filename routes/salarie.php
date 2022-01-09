<?php

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


Route::group([
    'prefix'        => 'salarie',
    'as'            => 'salarie.',
    'middleware'    => ['auth', 'StepTwo']
], function () {
    Route::get('/profile', 'SalarieController@profile')->name('profile');
    Route::put('/profile/update', 'SalarieController@updateProfile')->name('profile.update');
    Route::put('/update', 'SalarieController@update')->name('update');
    Route::get('/nouvelle/demande', 'DemandeController@create')->name('nouvelle.demande');
    Route::post('/nouvelle/demande', 'DemandeController@store')->name('nouvelle.demande.store');
    Route::get('/demande/{code}', 'DemandeController@show')->name('demande');
});
