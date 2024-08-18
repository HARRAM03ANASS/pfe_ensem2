@extends('master.layout')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white p-6 shadow-lg rounded-lg text-center mb-8 mt-4 byed">
        @if(auth()->check())
        <h1 class="text-4xl font-extrabold text-gray-800">
            Welcome {{ auth()->user()->name }}
        </h1>
        @else
        <h1 class="text-4xl font-extrabold text-gray-800">
            Let's get started
            {{-- @livewire('movie-search') --}}
        </h1>
        @endif
        <p class="text-yellow-600 mt-2">From movie lover to movie lovers</p>
    
    {{-- <a href="{{ route('register') }}" class="inline-flex items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white mt-4">
        <span class="w-full ">Get started its free!</span>
        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>  --}}

    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($movies as $movie) 
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transform transition-transform duration-200">
                <a href="{{ route('movie', $movie->api_id) }}" class="block">
                    <img
                        class="w-full h-64 object-cover"
                        src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}"
                        alt="{{ $movie->title }}"
                    />
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $movie->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit($movie->description, 100) }}</p>                       
                     <p class="text-gray-800 mt-2"><strong>Director:</strong> {{ $movie->director }}</p>
                        <p class="text-gray-500 mt-2 italic">{{ $movie->tagline }}</p>
                    </div>
                </a>

                <div class="flex items-center space-x-2 p-2">
                    <form action="{{ route('watchlist', $movie->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="watchlistButton h-8 w-8">
                            <i class="fas fa-clock {{ Auth::check() && Auth::user()->watchlist->contains($movie->id) ? 'text-green-500' : '' }}"></i>
                        </button>
                    </form>

                    <form action="{{ route('watched', $movie->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="watchedButton h-8 w-8">
                            <i class="fas fa-eye {{ Auth::check() && Auth::user()->watched->contains($movie->id) ? 'text-green-500' : '' }}"></i>
                        </button>
                    </form>



                    <button class="listButton h-8 w-8">
                        <i class="fa-solid fa-list listIcon"></i>
                    </button>
                </div>
            </div>

        @endforeach
    </div>
    
</div>
@endsection

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
@endsection
