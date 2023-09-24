<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;
use App\Http\Controllers\StatisticsController;

Route::post('/add-data', [TasksController::class, 'store']);
Route::get('/get-data', [TasksController::class, 'getData']);
Route::put('/update-data/{id}', [TasksController::class, 'updateData']);
Route::delete('/delete-data/{id}', [TasksController::class, 'deleteItem']);

Route::post('/add-statistic', [StatisticsController::class, 'store']);
Route::get('/get-statistics', [StatisticsController::class, 'getData']);
Route::put('/update-statistic/{id}', [StatisticsController::class, 'updateData']);
Route::delete('/delete-statistic/{id}', [StatisticsController::class, 'deleteItem']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
