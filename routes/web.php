<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Request;


Route::get('/',[PostController::class,'index']);


Route::get('posts/{post:slug}',[PostController::class,'show']);


Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::post('login',[SessionsController::class,'store']);