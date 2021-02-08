 @extends('layouts.subreddit')

 @section('content')
 @include('posts.pinned', [
     'pinned' => $subreddit->pinnedPosts()
 ])
 @include('posts.index', [
    'posts' => $subreddit->allPosts()
])
 @endsection