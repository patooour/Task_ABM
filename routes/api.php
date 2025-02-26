<?php


use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return auth()->user();
})->middleware('auth:sanctum');


Route::post('login' , [LoginController::class , 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('tasks', TaskController::class);

});

