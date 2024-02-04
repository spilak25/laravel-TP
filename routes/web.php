<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class,'index'])->name('home');

Route::prefix('/task')->name('task.')->controller(TaskController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/create','storeEdit')->name('store');
    Route::get('/edit/{task}','edit')->name('edit');
    Route::put('/edit/{task}','storeEdit')->name('update');
    Route::delete('/delete/{task}','delete')->name('destroy');
});

Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/create','storeEdit')->name('store');
    Route::get('/edit/{category}','edit')->name('edit');
    Route::put('/edit/{category}','storeEdit')->name('update');
    Route::delete('/delete/{category}','delete')->name('destroy');
});