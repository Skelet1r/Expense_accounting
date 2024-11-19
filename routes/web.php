<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/header', function () {
    return view('header');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/getRegister', 'getRegister')->middleware('guest')->name('getRegister');
    Route::post('/createAccount','createAccount')->middleware('guest')->name('createAccount');
});

Route::controller(SignInController::class)->group(function () {
    Route::get('/getSignin', 'getSignin')->middleware('guest')->name('getSignin');
    Route::post('/signin','Signin')->middleware('guest')->name('signin');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/getForgotPassword','getForgotPassword')->middleware('guest')->name('getForgotPassword');
    Route::post('/forgotPassword','forgotPassword')->middleware('guest')->name('forgotPassword');
    Route::get('/getResetPassword/{token}', 'getResetPassword')->middleware('guest')->name('password.reset');
    Route::post('/resetPassword','resetPassword')->middleware('guest')->name('resetPassword');
});

