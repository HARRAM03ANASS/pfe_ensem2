<div class="space-y-4">
    <div class="flex space-x-2 mb-4">
        <button wire:click="sortByNewest" class="bg-blue-500 text-white px-4 py-2 rounded">
            Newest
        </button>
        <button wire:click="sortByMostLiked" class="bg-blue-500 text-white px-4 py-2 rounded">
            Most Liked
        </button>
    </div>
    

    @if($reviews->isEmpty())
        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
            <p class="text-gray-800 text-lg inline">There are no reviews yet!</p>
        </div>
    @else
        @foreach($reviews as $review)
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('profile.show', $review->user->id) }}">
                        <img class="w-8 h-8 rounded-full" src="{{ $review->user->profile_photo_url }}" alt="user photo">
                        <span class="text-gray-800 text-md">{{ $review->user->name }}</span>
                    </a>
                    <!-- Other review content here -->
                    <livewire:review-like :reviewId="$review->id" :key="$review->id" />
                </div>
                <p class="text-gray-800 mt-2">{{ $review->content }}</p>
            </div>
        @endforeach
    @endif
</div>
