<?php

/**
 * Prefix URI: api/v1/dashboard
 * Prefix Name: api.v1.dashboard.
 * Middlewares: ['api']
 */

use App\Http\Controllers\Api\V1\Dashboard\Todo\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DASHBOARD Routes
|--------------------------------------------------------------------------
|
| Here is where you can register DASHBOARD routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])
	->prefix('todos')
	->name('todos.')
	->group(function () {
		Route::get('', [TodoController::class, 'index'])->name('index');
		Route::post('', [TodoController::class, 'create'])->name('create');
		Route::get('/{todo}', [TodoController::class, 'show'])->name('show');
		Route::put('/{todo}', [TodoController::class, 'update'])->name('update');
		Route::delete('/{todo}', [TodoController::class, 'delete'])->name('delete');
	});
