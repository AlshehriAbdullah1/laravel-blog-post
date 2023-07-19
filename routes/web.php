<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use \MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;
use MailchimpMarketing\Api\ListsApi;



Route::get('ping',function(){
    $mailchimp = new \MailchimpMarketing\ApiClient();
    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14',
    
    ]);
        $listsApi = new ListsApi($mailchimp);
    $response = $listsApi->getAllLists();

ddd($response);
});


Route::get('/',[PostController::class,'index']);


Route::get('posts/{post:slug}',[PostController::class,'show']);
Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::post('login',[SessionsController::class,'store']);