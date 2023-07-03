<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


//task-5
Route::get('/getPost',[PostController::class,'getPost']);

// task-6
Route::get('getTotalPostByCategoryId/{categoryId}',[PostController::class,'getCount']);

// task-7
Route::get('posts/{id}/delete',[PostController::class,'deletePost']);

//task-8
Route::get('getSoftDeletePosts',[PostController::class,'getSoftData']);


// task-9
Route::get('/posts',[PostController::class,'displayPost']);


// task-10
Route::get('/categories/{id}/posts',[PostController::class,'getCategoryIdPost']);

// task-11

Route::get('/latestPosts/{id}',[PostController::class,'getlatestPosts']);

// task-12
Route::get('/categoriesLatestPost',[PostController::class,'getLatestCategoryPosts']);
