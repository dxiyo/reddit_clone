@extends('layouts.subreddit')

@section('content')
<div class="bg-white border border-gray-300 rounded flex">
    <div class="w-10 flex flex-col items-center p-2">
        <a href="#"><i class="fas fa-arrow-up text-gray-500 hover:bg-gray-200 p-1 hover:text-red-600"></i></a>
        <span class="font-medium">000</span>
        <a href="#"><i class="fas fa-arrow-down text-gray-500 hover:bg-gray-200 p-1 hover:text-blue-600"></i></a>
    </div>
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
        <p>{{$post->body}}</p>
        <div>
            <span class="p-1 mt-2 hover:bg-gray-200 text-gray-500 text-xs font-bold cursor-pointer"><i class="fas fa-comment-alt"></i> 50 Comments</span>
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
@endsection
