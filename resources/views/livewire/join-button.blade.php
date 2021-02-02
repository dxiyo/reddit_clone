<form action="/r/{{$subreddit->name}}" method="post">
    @csrf
    <button 
        type="submit" 
        class=" @auth
                @if(auth()->user()->is_subscribed($subreddit))
                text-blue-600 border-2 border-blue-600
                @else
                bg-blue-600 hover:bg-blue-500 text-white
                @endif
                @endauth
                @guest
                bg-blue-600 hover:bg-blue-500 text-white
                @endguest
                font-bold px-10 py-1.5 rounded-3xl"
                >
                @auth
                @if (auth()->user()->is_subscribed($subreddit))
                <span id="joined-btn">Joined</span>
                @else
                Join
                @endif
                @endauth
                @guest
                Join
                @endguest
    </button>
</form>