<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest Shared <span class="text-blue-500">Blog Posts!</span> 
    </h1>

    <p class="text-sm mt-14">
        Go Ahead! share anything you want to, I will look at it as soon as possible. P.S , I never leave any post without a comment, so be prepared! 
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        

        <div class="relative flex lg:inline-flex  bg-gray-100 rounded-xl">
        <!--  Category -->
       <x-category-dropdown />
        </div>

        <!-- Other Filters -->
     

        <!-- Search -->


        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if(request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{request('search')}}"
                       >
                       
            </form>
        </div>
    </div>
    </div>
    
</header>
