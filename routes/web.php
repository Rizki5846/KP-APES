<?php

use App\Http\Controllers\PelanggaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\KategoriPelanggaranController;
use App\Http\Controllers\SubKategoriController;
use App\Models\Kategori;
use App\Models\Pelanggaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

/**
 * Auth Routes
 */
Auth::routes(['verify' => false]);


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::middleware('auth')->group(function () {
        /**
         * Home Routes
         */
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        /**
         * Role Routes
         */    
        Route::resource('roles', RolesController::class);
        /**
         * Permission Routes
         */    
        Route::resource('permissions', PermissionsController::class);
        /**
         * User Routes
         */

        Route::get('Pelanggaran', [PelanggaranController::class, 'index'])->name('Pelanggaran.index');
        Route::get('/Pelanggaran/create', [PelanggaranController::class, 'create'])->name('Pelanggaran.create');
        Route::get('/subkategori/{katPelanggaranId}', [PelanggaranController::class, 'getByKatPelanggaran']);
        Route::post('/storeKategori', [PelanggaranController::class, 'storeKategori'])->name('Pelanggaran.storeKategori');
        Route::post('/storeSubKategori', [PelanggaranController::class, 'storeSubKategori'])->name('Pelanggaran.storeSubKategori');
        Route::resource('Pelanggaran', PelanggaranController::class);

        



        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
    });
});
