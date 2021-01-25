@extends('layouts.app')

@section('header')
    <header class="flex flex-col">
        <div class="w-full h-24 bg-gray-900"></div>
        <div class="w-full h-24 bg-white">
            <div class="w-2/3 mx-auto flex">
                <img src="{{asset('/images/reddit.PNG')}}" alt="" class="rounded-full transform -translate-y-3" width="72" height="72">
                <div class="flex flex-col p-2 ml-2">
                    <h1 class="font-bold text-4xl">{{ $subreddit->name }}</h1>
                    <span class="text-sm text-gray-500">/r/{{$subreddit->name}}</span>
                </div>
                <div class="ml-6 mt-2.5">
                    <x-join-button />
                </div>
            </div>
        </div>
    </header>
@endsection