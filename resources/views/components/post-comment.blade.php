
@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img  class="rounded-xl" src="https://i.pravatar.cc/100" width="60"  height="60">
    </div>


    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}}</h3>
            <p class="text-xs">posted
            <time> {{$comment->created_at->format('F j, Y, g:i a')}}</time> </p>
        </header>

        <p>
            {{$comment->body}}
        </p>
    </div>
</article>