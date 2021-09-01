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
    Route::get('pages/complex/trashed', [App\Http\Controllers\ComplexController::class, 'onlyTrashedComplex'])->name('trashed_complex');
    Route::get('pages/complexe.restore/{id}', [App\Http\Controllers\ComplexController::class, 'restoreComplex'])->name('restore_complex');
    Route::get('pages/complexe/permanentlyDelete/{id}', [App\Http\Controllers\ComplexController::class, 'permanentlyDeleteComplex'])->name('permanently_delete_complex');
    
    
    Route::resource('/cladiri', App\Http\Controllers\CladireController::class);
    Route::resource('/apartamente',App\Http\Controllers\ApartamentController::class);

    Route::resource('/proprietari', App\Http\Controllers\ProprietarController::class);
        Route::get('pages/proprietar/trashed', [App\Http\Controllers\ProprietarController::class, 'onlyTrashedProprietar'])->name('trashed_proprietar');
        Route::get('pages/proprietari.restore/{id}', [App\Http\Controllers\ProprietarController::class, 'restoreProprietar'])->name('restore_proprietar');
        Route::get('pages/proprietar /permanentlyDelete/{id}', [App\Http\Controllers\ProprietarController::class, 'permanentlyDeleteProprietar'])->name('permanently_delete_proprietar');