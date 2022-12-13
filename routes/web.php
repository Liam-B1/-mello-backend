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

// Route::get('/', function () {

// });

Route::get('/todo-lists', [TodoListController::class, 'index'])->name('todo-list.index');

Route::get('/todo-lists/{TodoList}/items', [TodoListController::class, 'get'])->name('todo-list.get');

Route::post('/todo-lists', [TodoListController::class, 'store'])->name('todo-Lists.store');




