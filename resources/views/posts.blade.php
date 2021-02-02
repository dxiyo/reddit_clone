@foreach ($posts as $post)    
<div class="bg-white min-h-24 border border-gray-300 hover:border-gray-500 rounded-lg flex mb-3">
    {{-- UPVOTE AND DOWNVOTE --}}
    {{-- @livewire('karma', ['karma' => $post->purekarma]) --}}
    @livewire('upvotes', ['upvotes' => $post->upvotes ?: 0, 'post' => $post])
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
            <a href="{{route('post', ['postTitle' => $post->title, 'subreddit' => $post->subreddit_name])}}">
                <span class="hover:underline">{{ $post->created}}</span>
            </a>
        </span>
        {{-- POST TITLE --}}
        <a href="{{route('post', ['postTitle' => $post->title, 'subreddit' => $post->subreddit_name])}}">
            <h3 class="font-bold text-xl mt-2">{{$post->title}}</h3>
        </a>
        <div>
            <a href="{{route('post', ['postTitle' => $post->title, 'subreddit' => $post->subreddit_name])}}">
                <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-comment-alt"></i> {{$post->numberOfComments()}} Comments</span>
            </a>
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
    </div>
</div>
@endforeach
