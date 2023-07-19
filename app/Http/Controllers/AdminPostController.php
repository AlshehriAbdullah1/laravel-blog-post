<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index () {

        return view('admin.posts.index',[
            'posts'=>Post::paginate(50),
        ]);
    }
     public function store()
    {
       

       $attributes = request()->validate([
        'title'=>'required',
        'slug'=>['required',Rule::unique('posts','slug')],
        'excerpt'=>'required',
        'thumbnail'=>'required|image',
        'body'=>'required',
        'category_id'=>['required',Rule::exists('categories','id')],
       ]);
       

       $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
       $attributes['user_id']=auth()->id();
       Post::create($attributes);
       return redirect('/');
    }   
    

        public function create(){
       return view('admin.posts.create');
    }   

    public function edit(Post $post){
        return view('admin.posts.edit',[
            'post'=>$post
        ]);
    }

    public function update(Post $post){
        
       $attributes = request()->validate([
        'title'=>'required',
        'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
        'excerpt'=>'required',
        'thumbnail'=>'image',
        'body'=>'required',
        'category_id'=>['required',Rule::exists('categories','id')],
       ]);

       if(isset($attributes['thumbnail'])){

           $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
       }

       $post->update($attributes);
       return back()->with('success','Post updated');
       
    }
    public function destroy(Post $post){
        $post->delete();

        return back()->with('success','Post deleted! ');
    }
}
