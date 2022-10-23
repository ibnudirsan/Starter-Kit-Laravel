<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('app/v1/')->group(function () {
    Auth::routes();
    Route::get('reload-captcha',[LoginController::class,'reloadCaptcha']);
});