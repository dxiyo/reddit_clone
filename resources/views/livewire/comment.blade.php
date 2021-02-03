@foreach ($comments as $comment)
<div>
    <div class="flex p-3 min-w-full">
        <a href="/user/{{$comment->user->name}}" class="mr-3">
            <img src="{{$comment->user->avatar}}" width="36.4" height="36.4" alt="" class="inline rounded-full">
        </a>
        <div class="flex flex-col">
            <span class="text-gray-500 text-xs">
                <a href="/r/{{$comment->user->name}}" class="">
                    <span class="text-xs text-black font-bold hover:underline">{{$comment->user->name}}</span> 
                </a>
                {{-- POSTED X AGO --}}
                <span class="hover:underline">{{ $comment->created}}</span>
            </span>
            <p>{{$comment->body}}</p>
            <div class="flex items-center">
                @livewire('comment-upvotes', ['upvotes' => $comment->upvotes, 'comment' => $comment])
                @livewire('reply-button')
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"> Give Award</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"> Share</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"> Report</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"> Save</span>
                </a>
                <a href="#" wire:click="toggleMore()">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-ellipsis-h"></i></span>
                </a>
            </div>
        </div>
</div>
    @if ($comment->hasReplies())
        <div class="ml-8">
            @livewire('comment', ['comments' => $comment->repliesWithUpvotes()])
        </div>
    @endif
</div>
@endforeach