<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',[PagesController::class, 'index']); 
Route::get('/blog',[PagesController::class, 'blog']); 
Route::get('/create',[PostsController::class, 'create']); 
Route::post('/blog',[PostsController::class, 'store']); 
Route::get('/blog/{id}',[PostsController::class, 'show']); 
Route::get('/blog/{id}/edit',[PostsController::class, 'edit']); 
Route::put('/blog/{articl}/update',[PostsController::class, 'update'])->name('update'); 
Route::get('/blog/{id}/destroy',[PostsController::class, 'destroy']);
// Route::get('/blog',[PostsController::class, 'show']); 
// Route::post('/blog', 'PostsController@store');



// Route::get('/create', PostsController::class); 


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

