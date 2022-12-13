<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Controllers\ItemsController;
use Illuminate\Controllers\TodoListController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('todo-lists/basic', [TodoListsController::class, 'basic']);
Route::get('todo-lists', [TodoListsController::class, 'all']);
Route::post('todo-lists', [TodoListsController::class, 'store']);
Route::patch('todo-lists/{todoList', [TodoListsController::class, 'update']);

Route::delete('todo-lists/{todoList}', [TodoListsController::class, 'delete']);

Route::get('Items/{item}', [ItemsController::class, 'all']);
Route::post('Items', [ItemsController::class, 'store']);
Route::patch('Items/{item}', [ItemsController::class, 'update']);
Route::delete('Items/{item}', [ItemsController::class, 'delete']);

