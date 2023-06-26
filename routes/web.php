<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// probelm-2


Route::get('/getPost',[PostController::class,'getPost']);
Route::get('getTotalPostByCategoryId/{categoryId}',[PostController::class,'getCount']);
Route::get('post/{id}/delete',[PostController::class,'deletePost']);

// get all post
Route::get('/posts',[PostController::class,'displayPost']);

Route::get('/categories/{id}/posts',[PostController::class,'getCategoryIdPost']);

// latest post

Route::get('/latestPosts/{id}',[PostController::class,'getlatestPosts']);