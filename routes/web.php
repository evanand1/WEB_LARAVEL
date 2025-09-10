<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('coba');
});

use App\Http\Controllers\ToDoController;

Route::get('/', [ToDoController::class, 'index'])->name('todo.index');
Route::post('/store', [ToDoController::class, 'store'])->name('todo.store');
Route::patch('/todo/{id}', [ToDoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [ToDoController::class, 'destroy'])->name('todo.destroy');

