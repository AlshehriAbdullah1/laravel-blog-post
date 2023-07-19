<x-layout>

    <x-setting heading="Edit Post: {{$post->title}}">
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @method('PATCH')
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="title">
                Title
                </label>
                <input 
                type="text"
                value="{{$post->title}}"
                name="title"
                id="title" required
                class="border border-gray-400 p-2 w-full">
    
    
                @error('title')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="slug">
                Slug
                </label>
                <input 
                type="text"
                value="{{$post->slug}}"
                name="slug"
                id="slug" required
                class="border border-gray-400 p-2 w-full">
    
    
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            
            <div class="flex mt-6">
                <div class="flex-1">

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                        for="thumbnail">
                        Thumbnail
                        </label>
                        <input 
                        value="{{$post->thumbnail}}"
                        type="file"
                        name="thumbnail"
                        id="thumbnail" 
                        class="border border-gray-400 p-2 w-full">
            
            
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <img src="/images/illustration-1.png" alt="" class="rounded-xl ml-6" width="100">
            </div>
            
    
    
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="excerpt">
                Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full" 
                name="excerpt" id="excerpt"
                
                required>
               {{$post->excerpt}}</textarea>
                 @error('excerpt')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
            </div>
           
    
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="body">
                Body
                </label>
                <textarea class="border border-gray-400 p-2 w-full" 
                name="body" id="body" required>
            {{$post->body}}
            </textarea>
                 @error('body')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
            </div>
    
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="category_id">
                Select Category
                </label>
                <select name="category_id" id="category_id" >
                    @foreach (\App\Models\Category::all() as $category) {
                        <option value="{{$category->id}}"
                         {{old('category_id',$post->category_id)==$category->id? 'selected':''}}>
                         {{ucwords($category->name)}}
                        </option>
                    
                    } 
                    @endforeach
                </select>
                 @error('category_id')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
            </div>
    
            <button type="submit" 
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
            >
            Update
        </button>
    
    
      
        </form>  
    </x-setting>
        

</x-layout>