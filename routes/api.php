<?php

use App\Http\Controllers\AuthController;
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
Route::group(['middleware' => ['enforceJson', 'auth']], function(){
    Route::post('/project/attach', [ProjectController::class, 'attach']);
    Route::post('/project/detach', [ProjectController::class, 'detach']);

    Route::apiResource('user', UserController::class);
    Route::apiResource('project', ProjectController::class);
    Route::apiResource('stage', StageController::class);
    Route::apiResource('task', TaskController::class);
});

Route::group([
    'middleware' => ['api','enforceJson'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
