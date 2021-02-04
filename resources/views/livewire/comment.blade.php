<div>
    <div class="flex p-3 min-w-full">
        <a href="/user/{{$comment->user->name}}" class="mr-3">
            <img src="{{$comment->user->avatar}}" width="36.4" height="36.4" alt="" class="inline rounded-full">
        </a>
        <div class="flex flex-col w-full">
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
                <button wire:click="toggleReply()">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"> 
                        <i class="fas fa-comment-alt"></i>
                        Reply
                    </span>
                </button>
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
            {{-- HIDDEN REPLY FORM --}}
            <div class="p-2 {{$reply}}">
                <form action="/{{$comment->id}}/reply" method="post">
                    @csrf
                    <textarea name="comment" id="" rows="6" class="resize-none py-2 px-4 focus:border-black focus:ring-0 w-full border border-gray-100 rounded" placeholder="What are your thoughts?"></textarea>
                    <div class="flex justify-end items-center bg-gray-100 py-1 px-2">
                        <button wire:click="toggleReply()" class="text-blue-600 mr-8 font-bold">Cancel</button>
                        <button class="bg-blue-600 text-white font-bold px-5 rounded-3xl" type="submit">Reply</button>
                    </div>
                </form>
            </div>
        </div>
</div>
    @if ($comment->hasReplies())
        @foreach ($comment->repliesWithUpvotes() as $comment)
            <div class="ml-8">
                @livewire('comment', ['comment' => $comment], key($comment->id))
            </div>
        @endforeach
    @endif
</div>