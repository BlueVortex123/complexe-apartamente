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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['role:admin|contabil']], function () {
        Route::resource('/proprietari', App\Http\Controllers\ProprietarController::class);
        Route::get('pages/proprietari/trashed', [App\Http\Controllers\ProprietarController::class, 'onlyTrashedProprietar'])->name('trashed_proprietar');
        Route::get('pages/proprietari.restore/{id}', [App\Http\Controllers\ProprietarController::class, 'restoreProprietar'])->name('restore_proprietar');
        Route::get('pages/proprietar/permanentlyDelete/{id}', [App\Http\Controllers\ProprietarController::class, 'permanentlyDeleteProprietar'])->name('permanently_delete_proprietar');
    });

    Route::group(['middleware' => ['role:admin|agent']], function () {
        Route::resource('/complexe', App\Http\Controllers\ComplexController::class);
        Route::get('pages/complex/trashed', [App\Http\Controllers\ComplexController::class, 'onlyTrashedComplex'])->name('trashed_complex');
        Route::get('pages/complexe.restore/{id}', [App\Http\Controllers\ComplexController::class, 'restoreComplex'])->name('restore_complex');
        Route::get('pages/complexe/permanentlyDelete/{id}', [App\Http\Controllers\ComplexController::class, 'permanentlyDeleteComplex'])->name('permanently_delete_complex');
    
    
        Route::resource('/cladiri', App\Http\Controllers\CladireController::class);
        Route::get('pages/cladiri/trashed', [App\Http\Controllers\CladireController::class, 'onlyTrashedCladire'])->name('trashed_cladiri');
        Route::get('pages/cladiri.restore/{id}', [App\Http\Controllers\CladireController::class, 'restoreCladire'])->name('restore_cladire');
        Route::get('pages/cladire/permanentlyDelete/{id}', [App\Http\Controllers\CladireController::class, 'permanentlyDeleteCladire'])->name('permanently_delete_cladire');

        Route::resource('/apartamente',App\Http\Controllers\ApartamentController::class);
        Route::get('pages/apartamente/trashed', [App\Http\Controllers\ApartamentController::class, 'onlyTrashedApartament'])->name('trashed_apartamente');
        Route::get('pages/apartamente.restore/{id}', [App\Http\Controllers\ApartamentController::class, 'restoreApartament'])->name('restore_apartament');
        Route::get('pages/apartament/permanentlyDelete/{id}', [App\Http\Controllers\ApartamentController::class, 'permanentlyDeleteApartament'])->name('permanently_delete_apartament');
    });

});
