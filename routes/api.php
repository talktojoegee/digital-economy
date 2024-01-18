<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mailer/send/{slug}/{email}', [App\Http\Controllers\UtilityController::class, 'attendToRemoteRegistrationRequest'])->name('remote-registration');
//Route::get('/mailer/send', [App\Http\Controllers\UtilityController::class, 'attendToRemoteRegistrationRequest'])->name('remote-registration');
