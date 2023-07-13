<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Request;


Route::get('/',[PostController::class,'index']);


Route::get('posts/{post:slug}',[PostController::class,'show']);

