<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tarefa', [TaskController::class, 'index']);
Route::get('tasks/{id}', [TaskController::class, 'findTaskById']);
Route::get('/pendingtasks', [TaskController::class, 'listPendingTasks']);
Route::post('/tasks', [TaskController::class, 'createTask']);
Route::put('/tasks/{id}', [TaskController::class, 'updateTask']);
Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask']);

Route::get('/', function () {
    return response()->json([
        "message" => "success",
    ]);
});