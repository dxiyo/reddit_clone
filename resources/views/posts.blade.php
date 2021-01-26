@foreach ($posts as $post)    
<div class="bg-white min-h-24 border border-gray-300 hover:border-gray-500 rounded-lg flex mb-3">
    <div class="w-10 bg-gray-100 flex flex-col items-center p-2">
        <a href="#"><i class="fas fa-arrow-up hover:bg-gray-200 p-1 hover:text-red-600"></i></a>
        <span class="font-medium">000</span>
        <a href="#"><i class="fas fa-arrow-down hover:bg-gray-200 p-1 hover:text-blue-600"></i></a>
    </div>
    <div class="flex flex-col p-2">
        <span class="text-gray-500 text-xs">
            @if (isset($inHome)) {{-- If this the homepage. view the name of the subreddit on the post --}}
                <a href="/r/{{$post->subreddit->name}}" class="text-xs text-black font-bold hover:underline">/r/{{$post->subreddit->name}}</a>
            @endif
            • Posted by <span class="hover:underline">u/{{$post->user->name}}</span> 
            <span class="hover:underline">{{ $post->created}}</span> 
        </span>
        <h3 class="font-bold text-xl mt-2">{{$post->title}}</h3>
        <div>
            <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-comment-alt"></i> 50 Comments</span>
            <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-share"></i> Share</span>
            <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-bookmark"></i> Save</span>
            <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold"><i class="fas fa-ellipsis-h"></i></span>
        </div>
    </div>
</div>
@endforeach
