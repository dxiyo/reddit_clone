@foreach ($posts as $post)    
<div class="bg-white min-h-24 border border-gray-300 hover:border-gray-500 rounded-lg flex mb-3">
    {{-- UPVOTE AND DOWNVOTE --}}
    {{-- @livewire('karma', ['karma' => $post->purekarma]) --}}
    @livewire('upvotes', ['upvotes' => $post->upvotes ?: 0, 'post' => $post, 'type' => get_class($post) == "App\Models\Post" ? "text" : "image"])
    <div class="flex flex-col p-2">
        <span class="text-gray-500 text-xs">
            @if (isset($inHome)) {{-- If this the homepage. view the name of the subreddit on the post --}}
                <a href="/r/{{$post->subreddit->name}}" class="">
                    <img src="{{$post->subreddit->logo}}" width="20" height="20" alt="" class="inline rounded-full">
                   <span class="text-xs text-black font-bold hover:underline">/r/{{$post->subreddit->name}}</span> 
                </a>
                <span class="text-black font-thin"> • </span>
            @endif
            Posted by <span class="hover:underline">u/{{$post->user->name}}</span> 
            {{-- POSTED X AGO --}}
            <a href="{{route('post', ['postTitle' => $post->title, 'type' => get_class($post), 'subreddit' => $post->subreddit_name, 'id' => $post->id])}}">
                <span class="hover:underline">{{ $post->created}}</span>
            </a>
        </span>
        {{-- POST TITLE --}}
        <a href="{{route('post', ['postTitle' => $post->title, 'type' => get_class($post), 'subreddit' => $post->subreddit_name, 'id' => $post->id])}}">
            <h3 class="font-bold text-xl mt-2">{{$post->title}}</h3>
        </a>

        {{-- IF IT'S AN IMAGE, PUT THE IMAGE IN --}}
        @if ($post instanceof \App\Models\ImagePost)
            <a href="{{route('post', ['postTitle' => $post->title, 'type' => get_class($post), 'subreddit' => $post->subreddit_name, 'id' => $post->id])}}">
                <img src="{{asset($post->path)}}" class="w-full" alt="">
            </a>
        @endif
        <div>
            <a href="{{route('post', ['postTitle' => $post->title, 'type' => get_class($post), 'subreddit' => $post->subreddit_name, 'id' => $post->id])}}">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-comment-alt"></i> {{$post->numberOfComments()}} Comments</span>
            </a>
            <a href="#">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-share"></i> Share</span>
            </a>
            <a href="#">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-bookmark"></i> Save</span>
            </a>
            @if ($post->subreddit->isModeratedBy(auth()->user())) {{-- if not in the homepage. show this --}}
            <a href="#">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-check"></i> Approve</span>
            </a>
            @endif
            @can('delete_post', $post)
            <a href="#">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-times"></i> Delete Post</span>
            </a>
            @endcan
            <a href="#">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-ellipsis-h"></i></span>
            </a>
        </div>
    </div>
</div>
@endforeach
