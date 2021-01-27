@extends('layouts.app')

@section('header')
    <header class="flex flex-col">
        <div class="w-full h-24 bg-gray-900"></div>
        <div class="w-full h-24 bg-white">
            <div class="w-2/3 mx-auto flex">
                <img src="{{$subreddit->logo}}" alt="" class="rounded-full transform -translate-y-3" width="72" height="72">
                <div class="flex flex-col p-2 ml-2">
                    <h1 class="font-bold text-4xl">{{ $subreddit->name }}</h1>
                    <span class="text-sm text-gray-500">/r/{{$subreddit->name}}</span>
                </div>
                <div class="ml-6 mt-2.5">
                    <x-join-button :subreddit="$subreddit" />
                </div>
            </div>
        </div>
    </header>
@endsection

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

@section('sidebar')
<div class="bg-white border border-gray-300 rounded">
    <div class="p-2 bg-gray-400 rounded-t">
        <h4 class="font-bold">About Community</h4>
    </div>
    <div class="p-3">
        <p>{{$subreddit->description}}</p>
        <div class="flex mt-4">
            <div class="flex flex-col mr-16">
                <span class="leading-5 text-lg">100k</span>
                <span class="leading-5 text-sm">Members</span>
            </div>
            <div class="flex flex-col">
                <span class="leading-5 text-lg">2k</span>
                <span class="leading-5 text-sm">Online</span>
            </div>
        </div>
        <hr class="mx-auto text-gray-100 my-3">
        <div class="flex mb-2">
            <svg class="w-4 mr-2" viewBox="0 5 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><g><path d="M37.5,22.5V20h-35v15c0,1.4,1.1,2.5,2.5,2.5h30c1.4,0,2.5-1.1,2.5-2.5v0H6.2C5.6,35,5,34.5,5,33.8l0,0c0-0.7,0.6-1.2,1.2-1.2h31.3V30H6.2C5.6,30,5,29.5,5,28.8v0c0-0.7,0.6-1.2,1.2-1.2h31.3V25H6.2C5.6,25,5,24.5,5,23.8v0c0-0.7,0.6-1.2,1.2-1.2H37.5z"></path><path d="M22.5,6c0,1.4-1.1,2.5-2.5,2.5S17.5,7.4,17.5,6S20,0,20,0S22.5,4.6,22.5,6z"></path><path d="M20,15L20,15c-0.7,0-1.3-0.6-1.3-1.2v-2.5c0-0.7,0.6-1.2,1.2-1.2h0c0.7,0,1.2,0.6,1.2,1.2v2.5C21.2,14.5,20.7,15,20,15z"></path><path d="M22.8,11.3v2.3c0,1.4-1,2.7-2.5,2.9c-1.6,0.2-3-1.1-3-2.7v-5c0,0,0-0.1,0-0.1l-0.8-0.4c-0.9-0.4-2-0.3-2.7,0.4L2.5,18.5h35L22.8,11.3z"></path></g></g></svg>
            <span> Created {{$subreddit->created}}</span>
        </div>
    </div>
</div>
@endsection

