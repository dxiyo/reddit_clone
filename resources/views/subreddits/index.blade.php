 @extends('layouts.subreddit')

 @section('content')
 @include('posts.index', [
    'posts' => $subreddit->allPosts()
])
 @endsection