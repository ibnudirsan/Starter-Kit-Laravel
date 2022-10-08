<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('app/v1/')->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index'])->name('home');
});