<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::prefix('app/v1/')->group(function () {
    Auth::routes();
    Route::get('reload-captcha',[LoginController::class,'reloadCaptcha']);
});

Route::prefix('app/v1/')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
});