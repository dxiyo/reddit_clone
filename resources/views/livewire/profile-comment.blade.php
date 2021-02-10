<div class="bg-white p-1 border border-gray-300 rounded-lg mb-3">
    <div class="flex flex-col ml-8">
        <div class="text-sm">
            <a href="/user/{{$comment->user->name}}" class="text-blue-500 hover:underline">{{$comment->user->name}}</a>
            @if (get_class($comment->commentable) == "App\Models\Comment")
            <span class="text-gray-400">replied to someone on </span>
            
            @else
            <span class="text-gray-400">commented on </span>
            <a 
            href="/r/{{$comment->commentable->subreddit}}/comments/{{$comment->commentable->title}}/{{get_class($comment->commentable)}}/{{$comment->commentable->id}}">{{$comment->commentable->title}}</a>
            @endif
        </div>
        <div></div>
    </div>
    <div class="flex min-w-full">
        <div class="mr-8">
        </div>
        <div class="flex flex-col w-full bg-blue-50 p-1.5">
            <span class="text-gray-500 text-xs">
                <a href="/r/{{$comment->user->name}}" class="">
                    <span class="text-xs text-black hover:underline">{{$comment->user->name}}</span> 
                </a>
                <span>{{$comment->upvotes}} points • </span>
                {{-- POSTED X AGO --}}
                <span class="hover:underline">{{ $comment->created}}</span>
            </span>
            <p>{{$comment->body}}</p>
            <div class="flex items-center">
                <a href="">
                    <span class="p-1 mt-2 hover:underline hover:text-black text-gray-500 text-xs font-bold">Reply</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:underline hover:text-black text-gray-500 text-xs font-bold"> Share</span>
                </a>
                <a href="#" >
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-ellipsis-h"></i></span>
                </a>
            </div>
            
        </div>
</div>
</div>