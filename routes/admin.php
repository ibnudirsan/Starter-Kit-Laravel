<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\ModuleController;
use App\Http\Controllers\Admin\Auth\PermissionController;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Admin\Master\CustomerController;
use App\Http\Controllers\Admin\Dashboard\dashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

/**
 * Dashboard
 */
Route::get('dashboard', [dashboardController::class, 'index'])->name('home');

/**
 * Auth Admin
 */
Route::group(['prefix'  => '/admin'], function () {
    Route::name('admin.')->group(function () {
        Route::controller(AdminController::class)->group( function () {
            Route::get('/list','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::post('/trash/{id}','trashedData')->name('trashData');
            Route::get('/trash','trash')->name('trash');
            Route::post('/restore/{id}','Restore')->name('restore');
        });
    });
});

/**
 * Auth Role 
 */
Route::group(['prefix' => '/role'], function () {
    Route::name('role.')->group(function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/list','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/view/{id}','view')->name('view');
            Route::post('/trash/{id}','trash')->name('trash');
            Route::get('/trash','dataTrash')->name('data.trash');
        });
    });
});

/**
 * Auth Module
 */
Route::group(['prefix' => '/module'], function () {
    Route::name('module.')->group(function () {
        Route::controller(ModuleController::class)->group(function () {
            Route::get('/list','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
        });
    });
});

/**
 * Auth Permission
 */
Route::group(['prefix' => '/permissions'], function () {
    Route::name('permissions.')->group(function () {
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/list','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
        });
    });
});

/**
 * Master Customer
 */
Route::group(['prefix'  => '/customer'], function () {
    Route::name('customer.')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/list','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','Store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::post('/trash/{id}','trashData')->name('trash');
            Route::get('/trash','Trash')->name('trash');
            Route::post('/restore/{id}','RestoreData')->name('restore');
            Route::post('/delete/{id}','delete')->name('delete');
            Route::post('/excel','downloadExcel')->name('download');
        });
    });
});
