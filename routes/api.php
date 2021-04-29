<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ambildatalevel', [LevelController::class, 'index']);
Route::get('ambildatauser', [UserController::class, 'index']);
Route::post('simpanuser', [UserController::class, 'store']);
