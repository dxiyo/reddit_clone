 @extends('layouts.subreddit')

 @section('content')
 @include('posts', [
    'posts' => $subreddit->posts->map(function($post) {
        return \App\Models\Post::withUpvotes()->where(['id' => $post->id])->get();
    })->flatten() // getting the upvotes as part of the ->posts relationship. so i have to map on each of the posts and then flatten it to get a clean collection of the subreddits posts with upvotes
])
 @endsection