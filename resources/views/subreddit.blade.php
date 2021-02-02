 @extends('layouts.subreddit')

 @section('content')
 @include('posts', [
    'posts' => $subreddit->postsWithUpvotes()
])
 @endsection