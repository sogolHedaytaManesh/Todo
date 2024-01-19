<?php

use App\Http\Controllers\Api\V1\Authentication\EmailVerificationController;
use App\Http\Controllers\Api\V1\Authentication\ForgotPasswordController;
use App\Http\Controllers\Api\V1\Authentication\LoginController;
use App\Http\Controllers\Api\V1\Authentication\RegisterController;
use App\Http\Controllers\Api\V1\Authentication\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1/auth')
	->middleware(['api', 'throttle:100,1'])
	->name('api.v1.auth.')
	->group(function () {
		Route::prefix('register')->group(function () {
			Route::post('/', RegisterController::class)->name('register');
			Route::put('/verify-email/{id}/{hash}', EmailVerificationController::class)
				->middleware('signed')
				->name('register.email-verification');
		});

		Route::post('login', LoginController::class)->name('login');
		Route::post('forgot-password', ForgotPasswordController::class)->name('forgot-password');
		Route::put('forgot-password/reset/{id}/{hash}', ResetPasswordController::class)
			->middleware('signed')
			->name('forgot-password.reset');
	});
