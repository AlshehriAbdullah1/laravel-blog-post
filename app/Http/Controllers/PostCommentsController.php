<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Abort;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostCommentsController extends Controller
{
   public function store(Post $post ,Request $request) {
    if(auth()->check()){
    $request->validate([
        'body'=>'required'
    ]);
 
    $post->comments()->create([
        'user_id'=> $request->user()->id,
        'body'=>$request->input('body')
    ]);
    // add aa comment to given post  =)  
    return back();

   }

   else{
    abort(400, 'You must be logged in!');


   }

}
   

}
