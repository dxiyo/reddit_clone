<div class="w-11/12 mt-8">
        <form action="/r/{{$post->subreddit->name}}/comments/{{$post->id}}/submit" method="post">
            @csrf
            
            <div class="">
                <p>Comment as {{auth()->user()->name}}</p>
                <textarea name="comment" id="" cols="30" rows="6" class="resize-none py-2 px-4 focus:border-black focus:ring-0 w-full border border-gray-100 rounded" placeholder="What are your thoughts?"></textarea>
                <div class="flex justify-end items-center bg-gray-100 py-1 px-2">
                    <button class="bg-blue-600 text-white font-bold px-5 rounded-3xl" type="submit">Comment</button>
                </div>
            </div>
        </form>
</div>