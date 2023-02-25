<?php

use Illuminate\Http\Request;
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



Route::resource('users', App\Http\Controllers\API\UserAPIController::class);
Route::get('users/', [App\Http\Controllers\API\UserAPIController::class,'index']);
Route::post('users/', [App\Http\Controllers\API\UserAPIController::class,'store']);
Route::post('users/{id}', [App\Http\Controllers\API\UserAPIController::class,'update']);
Route::delete('users/{id}', [App\Http\Controllers\API\UserAPIController::class,'destroy']);
Route::resource('groupes', App\Http\Controllers\API\GroupeAPIController::class);
Route::get('groups/', [App\Http\Controllers\API\GroupeAPIController::class,'index']);
Route::post('groups/', [App\Http\Controllers\API\GroupeAPIController::class,'store']);
Route::post('groups/{id}', [App\Http\Controllers\API\GroupeAPIController::class,'update']);
Route::delete('groups/{id}', [App\Http\Controllers\API\GroupeAPIController::class,'destroy']);
Route::get('users-verif/{nom}', [App\Http\Controllers\API\UserAPIController::class,'verifier']);
