<div>
    <button wire:click="toggleLike">
        @if($this->isLiked)
            <i class="fa-solid fa-heart text-red-500"></i> <!-- Red heart when liked -->
        @else
            <i class="fa-solid fa-heart text-gray-500"></i> <!-- Gray heart when not liked -->
        @endif
    </button>
    <span class="text-gray-500">{{ $this->likeCount }} likes</span>
</div>
