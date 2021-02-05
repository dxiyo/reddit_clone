 @extends('layouts.subreddit')

 @section('content')
 @include('posts', [
    'posts' => $subreddit->allPosts()
])
 @endsection