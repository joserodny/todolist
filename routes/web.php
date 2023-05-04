<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['as' => 'todolist.'], function() {
    Route::get('/', [ToDoListController::class, 'index']);
    Route::post('/', [ToDoListController::class, 'store'])->name('store');
    Route::put('/{id}', [ToDoListController::class, 'update'])->name('update');
    Route::delete('/{id}', [ToDoListController::class, 'destroy'])->name('destroy');

});


