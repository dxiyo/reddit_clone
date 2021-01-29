<form action="/r/{{$sub}}/submit" method="get">
    <select name="subreddit" wire:model="sub">
        <option value="">Choose One of your communities</option>
        @foreach ($subreddits as $subreddit)
            <option 
            value="{{$subreddit->name}}" 
            wire:key="{{$subreddit->name}}" @if ($currentSub == $subreddit->name) selected @endif>
                {{$subreddit->name}}
            </option>
        @endforeach
    </select>
</form>