<?php

use Illuminate\Support\Facades\Route;
use App\Layers\Presentation\Controllers\Todo\GetTaskController;
use App\Layers\Presentation\Controllers\Todo\CreateTaskController;
use App\Layers\Presentation\Controllers\Todo\UpdateTaskController;
use App\Layers\Presentation\Controllers\Todo\DestroyTaskController;
use App\Layers\Presentation\Controllers\Todo\GetListTasksController;

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

Route::get('/task/{id}', [GetTaskController::class, 'get'])->name('get.task');
Route::get('/task', [GetListTasksController::class, 'get'])->name('getList.task');
Route::post('/task', [CreateTaskController::class, 'create'])->name('create.task');
Route::patch('/task/{id}', [UpdateTaskController::class, 'update'])->name('update.task');
Route::delete('/task/{id}', [DestroyTaskController::class, 'destroy'])->name('destroy.task');
