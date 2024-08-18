@extends('master.layout')

@section('title','watchlist')
@section('content')
<div class="container mx-auto px-4 mt-6">
    <h2 class="text-4xl font-extrabold mb-6">You want to watch {{count($watchlist_movies)}} films.</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

        @if($watchlist_movies->isEmpty())
            @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
            @endif
        <div class="text-center text-gray-600 mt-8">
            <p class="text-2xl">You haven't added any movies to you're watchlist.</p>
        </div>
        @endIf
        @foreach ($watchlist_movies as $movie) 
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-transform duration-200 relative">
                <a href="{{ route('movie', $movie->api_id) }}" class="block">
                    <img
                        class="w-full h-64 object-cover"
                        src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}"
                        alt="{{ $movie->title }}"
                    />
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-gray-800">{{ $movie->title }}</h2>
                        <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($movie->description, 100) }}</p>                       
                        <p class="text-gray-800 mt-2 text-sm"><strong>Director:</strong> {{ $movie->director }}</p>
                        <p class="text-gray-500 mt-2 italic">{{ $movie->tagline }}</p>
                    </div>
                </a>

                <div class="flex items-center space-x-4 p-2 absolute bottom-0 left-0 right-0 bg-white bg-opacity-75">
                    <form action="{{ route('watchlist', $movie->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="watchlistButton h-8 w-8 flex items-center justify-center">
                            <i class="fas fa-clock {{ Auth::check() && Auth::user()->watchlist->contains($movie->id) ? 'text-green-500' : 'text-gray-400' }}"></i>
                        </button>
                    </form>

                    <form action="{{ route('watched', $movie->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="watchedButton h-8 w-8 flex items-center justify-center">
                            <i class="fas fa-eye {{ Auth::check() && Auth::user()->watched->contains($movie->id) ? 'text-green-500' : 'text-gray-400' }}"></i>
                        </button>
                    </form>

                    <button class="listButton h-8 w-8 flex items-center justify-center">
                        <i class="fa-solid fa-list listIcon text-gray-400"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection()
@section('script')
<script>
    // Handle button clicks
    document.querySelectorAll('.listButton, .watchlistButton, .watchedButton').forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); // Stop propagation to prevent navigation
        });
    });
    
    // Navigate to movie page on item click
    document.querySelectorAll('.byed').forEach(item => {
        item.addEventListener('click', function() {
            // Navigate to movie page
            window.location.href = this.querySelector('a').href;
        });
    });
</script>

@endsection()