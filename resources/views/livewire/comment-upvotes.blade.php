<div class="w-10 flex items-center p-2 justify-between p-1 w-20">
    <a href="#" wire:click.prevent="upvote()">
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
    </a>
    <div class="font-medium">{{$upvotes ?: 0}}</div>
    <a href="#" wire:click.prevent="downvote()">
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
    </a>
</div>