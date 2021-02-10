 @extends('layouts.subreddit')

 @section('content')
 @include('posts.pinned', [
     'pinned' => $subreddit->pinnedPosts()
 ])
 @foreach ($subreddit->allPosts() as $post)
 @include('posts.index', [
    'pinned' => 0
])   
 @endforeach
 @endsection