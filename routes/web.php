<?php

use App\Http\Controllers\InputController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelanggaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\KategoriPelanggaranController;
use App\Http\Controllers\SiswaController;
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
        Route::put('pelanggaran/{id}', [PelanggaranController::class, 'update'])->name('Pelanggaran.update');
        Route::post('pelanggaran/store', [PelanggaranController::class, 'store'])->name('Pelanggaran.store');
        Route::get('/subkategori/{katPelanggaranId}', [PelanggaranController::class, 'getByKatPelanggaran']);
        Route::get('pelanggaran/{id}/edit', [PelanggaranController::class, 'edit'])->name('Pelanggaran.edit');
        Route::delete('Pelanggaran/{id}', [PelanggaranController::class, 'destroy'])->name('Pelanggaran.destroy');
        Route::put('/kategori/{id}', [PelanggaranController::class, 'updateKategori'])->name('Pelanggaran.updateKategori');
        Route::get('kategori/{id}/edit', [PelanggaranController::class, 'editKategori'])->name('Pelanggaran.editKategori');
        Route::put('kategori/{id}', [PelanggaranController::class, 'updateKategori'])->name('Pelanggaran.updateKategori');
        

        // Add routes for handling categories
        Route::post('kategori/store', [PelanggaranController::class, 'storeKategori'])->name('Pelanggaran.storeKategori');
        Route::post('subkategori/store', [PelanggaranController::class, 'storeSubKategori'])->name('Pelanggaran.storeSubKategori');
        Route::delete('kategori/{id}', [PelanggaranController::class, 'destroyKategori'])->name('Pelanggaran.destroyKategori');

        Route::get('subkategori/{id}/edit', [PelanggaranController::class, 'editSubKategori'])->name('Pelanggaran.editSubKategori');
        Route::put('subkategori/{id}', [PelanggaranController::class, 'updateSubKategori'])->name('Pelanggaran.updateSubKategori');
        Route::delete('subkategori/{id}', [PelanggaranController::class, 'destroySubKategori'])->name('Pelanggaran.destroySubKategori');
        

        // Add routes for handling categories
        Route::post('kategori/store', [PelanggaranController::class, 'storeKategori'])->name('Pelanggaran.storeKategori');
        Route::post('subkategori/store', [PelanggaranController::class, 'storeSubKategori'])->name('Pelanggaran.storeSubKategori');
        Route::delete('kategori/{id}', [PelanggaranController::class, 'destroyKategori'])->name('Pelanggaran.destroyKategori');
        


        Route::get('siswa', [SiswaController::class, 'index'])->name('Siswa.index');
        Route::get('siswa/create', [SiswaController::class, 'create'])->name('Siswa.create');
        Route::post('/Siswa', [SiswaController::class, 'store'])->name('Siswa.store');
        Route::delete('siswa/{id}', [SiswaController::class, 'destroy'])->name('Siswa.destroy');
        


        Route::get('InputPelanggaran', [InputController::class, 'index'])->name('InputPelanggaran.index');
        Route::get('/input-pelanggaran/create', [InputController::class, 'create'])->name('InputPelanggaran.create');
        Route::post('/input-pelanggaran', [InputController::class, 'store'])->name('InputPelanggaran.store');
        Route::get('/search-siswa', [InputController::class, 'searchSiswa'])->name('searchSiswa');
        Route::get('/siswa/{nis}', [SiswaController::class, 'show'])->name('Siswa.show');


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
