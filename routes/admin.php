<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\Google2FaController;
use App\Http\Controllers\Admin\Auth\ModuleController;
use App\Http\Controllers\Admin\Auth\PermissionController;
use App\Http\Controllers\Admin\Auth\ProfileController;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Admin\Master\CustomerController;
use App\Http\Controllers\Admin\Dashboard\dashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
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
            Route::post('/restore/{id}','restore')->name('restore');
            Route::post('/delete/{id}','delete')->name('delete');
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
            Route::post('/trash/{id}','trash')->name('trash');
            Route::get('/trash','trashData')->name('data.trash');
            Route::post('/restore/{id}','restore')->name('restore');
            Route::post('/delete/{id}','delete')->name('delete');
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
            Route::post('/trash/{id}','trash')->name('trash');
            Route::get('trash','dataTrash')->name('data.trash');
            Route::post('/restore/{id}','restore')->name('restore');
            Route::post('/delete/{id}','delete')->name('delete');
        });
    });
});

/**
 * Profile User
 */
Route::group(['prefix'  => '/profile'], function () {
    Route::name('profile.')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/user','index')->name('index');
            Route::post('/update/profile/{id}','ProfileImage')->name('image');
            Route::post('/update/{id}','ProfileUpdate')->name('update');
            Route::get('/setting','setting')->name('setting');
            Route::post('/password','password')->name('password');
        });
    });
});

/**
 * Google 2FA
 */
Route::group(['prefix' => '/google2fa'], function () {
    Route::name('google2fa.')->group(function () {
        Route::controller(Google2FaController::class)->group(function () {

            Route::group(['middleware' => ['password.confirm']], function () {
                Route::get('/configuration','index')->name('index');
            });

            Route::post('/activation','activation')->name('activation');
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
            Route::post('/trash/{id}','trashData')->name('data.trash');
            Route::get('/trash','Trash')->name('trash');
            Route::post('/restore/{id}','RestoreData')->name('restore');
            Route::post('/delete/{id}','delete')->name('delete');
            Route::post('/excel','downloadExcel')->name('download');
        });
    });
});
