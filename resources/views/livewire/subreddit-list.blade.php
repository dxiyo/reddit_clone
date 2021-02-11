<div>
    <button wire:click="toggleList()" class="relative px-4 py-2 block w-40 ">
        {{-- if in the homepage show this --}}
        @if (\Request::is('/')) 
        <span class="mx-2">
            <svg class="w-5 inline fill-current text-blue-600" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15,9.9V8A5,5,0,0,0,5,8V9.9c-2.41.45-4,1.24-4,2.13,0,1.41,4,2.56,9,2.56s9-1.15,9-2.56C19,11.14,17.41,10.35,15,9.9Zm-2,.94a9.62,9.62,0,0,1-3,.39,9.62,9.62,0,0,1-3-.39V8a3,3,0,0,1,6,0Z"></path><path d="M2.74,14.6l3,2.12a7.39,7.39,0,0,0,8.6,0l3-2.12a24.63,24.63,0,0,1-7.26,1A24.63,24.63,0,0,1,2.74,14.6Z"></path><circle cx="16" cy="4" r="4" fill="none"></circle><circle cx="16" cy="4" r="3" fill="none"></circle></svg>
             Home
        </span>
        {{-- if in popular show this --}}
        @elseif(\Request::is('popular'))
        <span class="mx-2">
            <svg class="w-5 inline fill-current text-blue-600" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polygon points="12.5 3.5 20 3.5 20 11 17.5 8.5 11.25 14.75 7.5 11 2.5 16 0 13.5 7.5 6 11.25 9.75 15 6"></polygon></svg>
            Popular
        </span>    
        {{-- if in a subreddit. do this work to properly show the right subreddit name and logo --}}
        @elseif(\Request::is('r/*'))
            <?php
                $link = request()->url();
                $link_array = explode('/',$link);
                $subName = end($link_array); 

                $sub = App\Models\Subreddit::whereName($subName)->first();
            ?>
            <span class="mx-2">
                <img src="{{$sub->logo}}" alt="" class="w-5 inline rounded-full">
                /r/{{$subName}}
            </span>
        @endif

        <span class="ml-auto">
            <i class="fas fa-sort-down"></i>
        </span>
    </button>
    <div class="flex flex-col absolute m-h-24 bg-white {{$list}} z-10">
        <p class="text-xs text-gray-500 mx-auto py-2">REDDIT FEEDS</p>
        <a href="/" class="px-4 py-2 w-40 hover:bg-gray-100 flex items-center">
            <span class="mx-2"><svg class="w-5 inline fill-current text-blue-600" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15,9.9V8A5,5,0,0,0,5,8V9.9c-2.41.45-4,1.24-4,2.13,0,1.41,4,2.56,9,2.56s9-1.15,9-2.56C19,11.14,17.41,10.35,15,9.9Zm-2,.94a9.62,9.62,0,0,1-3,.39,9.62,9.62,0,0,1-3-.39V8a3,3,0,0,1,6,0Z"></path><path d="M2.74,14.6l3,2.12a7.39,7.39,0,0,0,8.6,0l3-2.12a24.63,24.63,0,0,1-7.26,1A24.63,24.63,0,0,1,2.74,14.6Z"></path><circle cx="16" cy="4" r="4" fill="none"></circle><circle cx="16" cy="4" r="3" fill="none"></circle></svg></span>    
            Home
        </a>
        <a href="/popular" class="px-4 py-2 w-40 hover:bg-gray-100 flex items-center">
            <span class="mx-2"><svg class="w-5 inline fill-current text-blue-600" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polygon points="12.5 3.5 20 3.5 20 11 17.5 8.5 11.25 14.75 7.5 11 2.5 16 0 13.5 7.5 6 11.25 9.75 15 6"></polygon></svg></span>    
            Popular
        </a>
        <p class="text-xs font-bold text-gray-500 mx-auto py-2">MY COMMUNITIES</p>
        @foreach ($subreddits as $subreddit)
            
            <a href="/r/{{$subreddit->name}}" class="px-4 py-2 w-40 hover:bg-gray-100">
                <span class="mx-2">
                    <img class="w-5 inline rounded-full" src="{{$subreddit->logo}}" alt="">
                </span>    
                /r/{{$subreddit->name}}
            </a>
        @endforeach
    </div>
</div>