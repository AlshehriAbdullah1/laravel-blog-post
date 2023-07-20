<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public function index(){    

        //dd(Gate::allows('admin'));

            return view('posts.index',[
        'posts'=>Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString()
       
       ]);
        
       
    }
    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post
        ]);
    }   
    public function create(){
       return view('admin.posts.create');
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
  
    

}
