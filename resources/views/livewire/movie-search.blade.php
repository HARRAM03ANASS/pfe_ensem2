<div class="relative z-50">
    <input wire:model.live="searchTerm" type="text" class="border p-2 rounded w-full" placeholder="Search for movies...">
    @if(strlen($searchTerm) > 2)
        <div class="absolute left-0 w-full bg-white border border-gray-200 shadow-lg mt-2 rounded-lg overflow-hidden">
            @if($movies->isNotEmpty())
                <ul>
                    @foreach($movies as $movie)
                        <li class="border-b last:border-b-0">
                            <a href="{{ route('movie', $movie->api_id) }}" class="block p-2 hover:bg-gray-100">
                                {{ $movie->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="p-2">No movies found.</p>
            @endif
        </div>
    @endif
</div>