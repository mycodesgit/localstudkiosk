<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\KioskDashController;
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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function () {
        return view('loginkiosk');
    });

    Route::get('/studkiosk', [LoginController::class, 'loginkioskstud'])->name('loginkioskstud');
    Route::post('/stud/user_login', [LoginController::class, 'studkiosk_login'])->name('studkiosk_login');
});

Route::group(['middleware'=>['login_auth']],function(){
    Route::prefix('student')->group(function () {
        Route::get('/info/kiosk/dashboard/view', [KioskDashController::class, 'kioskhome'])->name('kioskhome');
        Route::get('/info/kiosk/account/view', [KioskDashController::class, 'kioskaccount'])->name('kioskaccount');
        Route::get('/info/kiosk/logout', [KioskDashController::class, 'logout'])->name('logout');
    });
});