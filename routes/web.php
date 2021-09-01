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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/complexe', App\Http\Controllers\ComplexController::class);
Route::resource('/cladiri', App\Http\Controllers\CladireController::class);
Route::resource('/apartamente',\App\Http\Controllers\ApartamentController::class);
Route::resource('/proprietari', \App\Http\Controllers\ProprietarController::class);