<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

//I made all routes are protected by sanctum middleware is regisetred in kernel
//just for example if even user wishes to see posts he needs to logged in

Route::get('posts', [PostController::class ,'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('post/comments/{post:slug}', [CommentController::class ,'index']);

Route::get('comments/{id}', [CommentController::class, 'show']);
Route::get('comments/store/{post:slug}', [CommentController::class, 'show']);
