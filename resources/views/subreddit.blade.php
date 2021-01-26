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

@section('sidebar')
<div class="bg-white border border-gray-300 rounded">
    <div class="p-2 bg-gray-400 rounded-t">
        <h4 class="font-bold">About Community</h4>
    </div>
    <div class="p-3">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quibusdam?</p>
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
            <span> Created Mar17, 2018</span>
        </div>
    </div>
</div>
@endsection