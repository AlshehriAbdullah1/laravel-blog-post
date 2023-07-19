<x-layout>
    
    <section class=" py-8 max-w-md mx-auto">
        <h1 class="text-xl font-bold mb-4">
            Publish New Post
        </h1>
        <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="title">
                Title
                </label>
                <input 
                value="{{old('title')}}"
                type="text"
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
                value="{{old('slug')}}"
                type="text"
                name="slug"
                id="slug" required
                class="border border-gray-400 p-2 w-full">


                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="thumbnail">
                Thumbnail
                </label>
                <input 
                type="file"
                name="thumbnail"
                id="thumbnail" required
                class="border border-gray-400 p-2 w-full">


                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            


            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                for="excerpt">
                Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full" 
                name="excerpt" id="excerpt"
                
                required>
                {{old('excerpt')}}</textarea>
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
                {{old('body')}}
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
                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                        # code...
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
            Publish
        </button>


      
        </form>  
    </div>
</section> 

</x-layout>