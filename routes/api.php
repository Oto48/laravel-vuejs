<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;

Route::post('/add-data', [TasksController::class, 'store']);
Route::get('/get-data', [TasksController::class, 'getData']);
Route::put('/update-data/{id}', [TasksController::class, 'updateData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
