<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::post('/task', [TaskController::class, 'addTask'])->name('addTask');
Route::get('/task/{id}', [TaskController::class, 'editTask'])->name('editTask');
Route::put('/task/{id}/update', [TaskController::class, 'updateTask'])->name('updateTask');
Route::get('/task/{id}/delete', [TaskController::class, 'deleteTask'])->name('deleteTask');
