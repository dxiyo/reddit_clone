<div class="w-10 flex items-center p-2 justify-between p-1 w-20">
    <form 
        @auth action="/{{auth()->user()->id}}/upvote/comment/{{$comment->id}}" method="post" @endauth 
        @guest action="/login" method="get" @endguest
        >
        @csrf
        <button type="submit">
            <i class="fas fa-arrow-up 
                @auth
                    @if($comment->isUpvotedBy(auth()->user()))
                    text-red-600
                    @else
                    text-gray-500 
                    @endif
                @else
                text-gray-500 
                @endauth
                hover:bg-gray-200 p-1 hover:text-red-600"></i>
        </button>
    </form>
    <div class="font-medium">{{$upvotes ?: 0}}</div>
    <form 
        @auth action="/{{auth()->user()->id}}/downvote/comment/{{$comment->id}}" method="post" @endauth 
        @guest action="/login" method="get" @endguest
        >
        @csrf
        <button type="submit">
            <i class="fas fa-arrow-down
                text-gray-500 
                @auth
                    @if($comment->isDownvotedBy(auth()->user()))
                    text-blue-600
                    @else
                    text-gray-500 
                    @endif
                @else
                text-gray-500 
                @endauth
                hover:bg-gray-200 p-1 hover:text-blue-600"></i>
        </button>
    </form>
</div>