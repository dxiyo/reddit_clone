<div class="">

    <form action="/r/{{$sub}}/submit" method="get" class="mb-4">
        <select name="subreddit" wire:model="sub" class="border-0 rounded w-72">
            <option value="">Choose a community</option>
            @foreach ($subreddits as $subreddit)
                <option 
                value="{{$subreddit->name}}" 
                wire:key="{{$subreddit->name}}" @if ($currentSub == $subreddit->name) selected @endif>
                  <img src="{{$subreddit->logo}}" alt="" class="w-5 h-5 rounded-full border border-dashed"> {{$subreddit->name}}
                </option>
            @endforeach
        </select>
    </form>
    
    <div class="bg-white border border-gray-300 rounded p-3">
        <form action="/r/{{$currentSub}}/submit" method="post">
            @csrf
            <input type="text" name="title" placeholder="Title" class="py-2 px-4 rounded  @error('title') border-red-400 @else border-gray-200 @enderror mb-2 w-full focus:border focus:border-black focus:ring-0 mb-2">
            @error('title')
                <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
            
            <div class="rounded border border-gray-200 focus:ring-1 focus:ring-black">
                <h4 class="bg-gray-100 py-2 px-4 border-b border-gray-200">Markdown</h4>
                <textarea name="body" id="" cols="30" rows="6" class="resize-none py-2 px-4 focus:ring-0 w-full border-0" placeholder="Text (optional)"></textarea>
            </div>
            <div class="flex justify-end">
                <button 
                    class="
                        @if(!$currentSub)
                        bg-gray-300
                        cursor-not-allowed
                        @else
                        bg-blue-600 
                        @endif
                        text-white font-bold px-5 py-1 rounded-3xl mt-3 ml-auto" type="submit"
                    @if(!$currentSub)
                        disabled
                    @endif>
                        Post
                </button>
            </div>
        </form>
    </div>
</div>