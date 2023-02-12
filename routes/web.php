<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\HomeController;

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


Route::get('/',[postController::class,'showPost']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Auth::routes();
Route::get('/blogPost',[postController::class,'create'])->name('blogPost');

Route::post('/blogPost',[postController::class,'storePost'])->name('blogPost');
/*single post*/
Route::get('/singlePost/{id}',[postController::class,'singlePostview'])->name('singlePost');

/*delete */
Route::get('/Delete/{id}',[postController::class,'DeletePost'])->name('Delete');
/*edit */
Route::get('/edit/{id}',[postController::class,'editPost'])->name('edit');
Route::post('/update/{id}',[postController::class,'UpdatePost'])->name('update');
Route::post('/comment/{id}',[postController::class,'comment'])->name('comment');
Route::get('/comment/{id}',[postController::class,'showComment'])->name('comment');