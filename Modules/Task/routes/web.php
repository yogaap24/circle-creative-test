<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('task', TaskController::class)->names('tasks');
    Route::post('task/read', [TaskController::class, 'markAsRead'])->name('tasks.read_all');
});
