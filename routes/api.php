<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::apiResource('user', UserController::class);
Route::apiResource('project', ProjectController::class);
Route::apiResource('stage', StageController::class);
Route::apiResource('task', TaskController::class);
