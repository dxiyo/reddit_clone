<div class="w-10 flex flex-col items-center p-2">
    <form action="/karma" method="post" class="text-center">
        @csrf
        <button type="submit">
            <i class="fas fa-arrow-up text-gray-500 hover:bg-gray-200 p-1 hover:text-red-600"></i>
        </button>
        <span class="font-medium">{{$upvotes}}</span>
        <button type="submit">
            <i class="fas fa-arrow-down text-gray-500 hover:bg-gray-200 p-1 hover:text-blue-600"></i>
        </button>
    </form>
</div>