@extends('layouts.subreddit')

@section('content')
<h1 class="text-xl font-bold text-gray-800">Create a post</h1>
<hr class="border-white my-2">
@livewire('create-post', ['subreddits' => $subreddits, 'currentSub' => $subreddit->name])
@endsection