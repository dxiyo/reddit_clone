@extends('layouts.app')

@section('nav')
@include('navigation-menu', ['inSub' => false, 'subreddit' => '']);
@endsection

@section('header')
    
@endsection

@section('content')
<div class="">
    <div class="bg-white border border-gray-300 rounded">
        <div class="p-3">
            <h1 class="mb-4">Create a Community</h1>
            {{-- TEXT POST --}}
            <form action="/subreddits/create" method="post">
                @csrf
                <h1 class="mb-4">Name</h1>
                <input type="text" name="name" placeholder="Title" class="py-2 px-4 rounded  @error('title') border-red-400 @else border-gray-200 @enderror mb-2 w-full focus:border focus:border-black focus:ring-0 mb-2">
                @error('title')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
                
                <div class="mb-4">
                    <h1 class="mb-4">Description</h1>
                    <textarea name="description" id="" cols="30" rows="6" class="resize-none py-2 px-4 rounded border border-gray-200 focus:ring-1 focus:ring-black" placeholder="Text (optional)"></textarea>
                </div>
                <h1 class="mb-4">Community type</h1>
                <div class="">
                    <select name="type" id="">
                        <option value="public">Public</option>
                        <option value="restricted">Restricted</option>
                        <option value="private">Private</option>
                    </select>
                </div>
                <button type="submit" class="text-white bg-blue-600 font-bold px-5 py-1 rounded-3xl mt-3 ">Create Community</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('sidebar')
    
@endsection