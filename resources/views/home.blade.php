@extends('layouts.app')

@section('content')
@include('posts', [
    'inHome' => true
])
@endsection

@section('sidebar')
    <div class="bg-white border border-gray-300 rounded p-2 pl-3">
        <h4 class="font-bold text-gray-600 mb-4">Trending Communities</h4>
        <div class="flex flex-col">
            @foreach ($subreddits as $subreddit)
                <div class="flex mb-4">
                    <a href="/r/{{$subreddit->name}}"><img src="{{$subreddit->logo}}" width="32" height="32" alt="" class="rounded-full mr-1"></a>
                    <div class="flex flex-col">
                        <a href="/r/{{$subreddit->name}}" class="text-xs hover:underline">/r/{{$subreddit->name}}</a>
                        <span class="text-xs">909.678 Members</span>
                    </div>
                    <div class="ml-auto">
                        {{-- <x-join-button :subreddit="$subreddit" /> --}}
                        @livewire('join-button', ['subreddit' => $subreddit])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection