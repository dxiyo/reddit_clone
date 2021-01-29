<div class="cursor-pointer p-1.5 ml-4">
    <li wire:click="toggleRule">
        <span class="flex justify-content">
            <span class="mr-auto">Rule</span><span class="text-xs text-gray-600"><i class="fas fa-chevron-down"></i></span></li>
        </span>
    <p style="display:{{$display}};">{{$rule}}</p>
</div>
