<div class="bg-white border border-gray-300 rounded">

    <div class="flex">
        {{-- @livewire('karma', ['karma' => $post->purekarma]) --}}
        @livewire('upvotes', ['upvotes' => $upvotes, 'post' => $post])
        <div class="flex flex-col p-2">
            <span class="text-gray-500 text-xs">
                {{-- If this the homepage. view the name of the subreddit on the post --}}
                <a href="/r/{{$post->subreddit->name}}" class="">
                    <img src="{{$post->subreddit->logo}}" width="20" height="20" alt="" class="inline rounded-full">
                    <span class="text-xs text-black font-bold hover:underline">/r/{{$post->subreddit->name}}</span> 
                </a>
                <span class="text-black font-thin"> • </span>
                Posted by <span class="hover:underline">u/{{$post->user->name}}</span> 
                {{-- POSTED X AGO --}}
                <span class="hover:underline">{{ $post->created}}</span>
            </span>
            {{-- POST TITLE --}}
            <h3 class="font-bold text-xl mt-2 mb-4">{{$post->title}}</h3>
            {{-- IF THIS IS AN IMAGE. USE AN IMG TAG, ELSE USE A <P> TAG TO SHOW THE TEXT OF THE POST --}}
            <img src="{{$post->path}}" alt="">
            <div>
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold cursor-pointer"><i class="fas fa-comment-alt"></i> {{$post->numberOfComments()}} Comments</span>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-share"></i> Share</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-bookmark"></i> Save</span>
                </a>
                <a href="#">
                    <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-ellipsis-h"></i></span>
                </a>
            </div>
            @auth
            @livewire('create-comment', ['post' => $post])
            @endauth
        </div>
    </div>
    <hr class="my-4 w-5/6 mx-auto">
    <div class="">
        @foreach ($post->commentsWithUpvotes() as $comment)
            @livewire('comment', ['comment' => $comment], key($comment->id))
            
        @endforeach
    </div>
</div>