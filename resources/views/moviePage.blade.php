@extends('master.layout')

@section('content')
<div class="relative">
    <!-- Full-width backdrop image -->
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('https://image.tmdb.org/t/p/original{{ $movie_data->backdrop_path }}');">
        <!-- Black overlay for text readability -->
        <div class="bg-black bg-opacity-60 absolute inset-0"></div>        
    </div>

    <!-- Content container -->
    <div class="relative z-10 container mx-auto px-4 py-12 md:py-16">
        <div class="flex flex-col md:flex-row items-start">
            <!-- Poster image -->
            <div class="md:w-1/4 flex-shrink-0 mb-6 md:mb-0 mx-auto md:mx-0">
                <img class="rounded-lg shadow-lg w-full h-auto"
                     src="https://image.tmdb.org/t/p/w300{{ $movie_data->poster_path }}"
                     alt="Poster Image">
            </div>

            <!-- Movie details -->
            <div class="md:w-3/4 md:pl-8 text-white">
                <h1 class="text-3xl md:text-4xl font-extrabold mb-4">{{ $movie_data->title }}</h1>
                <p class="text-gray-300 mb-4">{{ $movie_data->description }}</p>
                <p class="text-gray-400 mb-2"><strong>Director:</strong> {{ $movie_data->director }}</p>
                <p class="text-gray-400 italic">{{ $movie_data->tagline }}</p>

                @guest
                   <div class='mt-4'>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center p-5 font-medium text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg rounded-lg text-sm me-2 mb-2">
                            <span class="w-full">Sign in to log, rate or review</span>
                            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div> 
                @endguest

                @auth
                <!-- Buttons and Flash Messages -->
                <div class="flex items-center space-x-4 mt-6 flex-wrap">
                    <form action="{{ route('watchlist', $movie_data->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                            <i class="fas fa-clock {{ Auth::check() && Auth::user()->watchlist->contains($movie_data->id) ? 'text-green-500' : '' }}"></i>
                        </button>
                    </form>
                    <form action="{{ route('watched', $movie_data->id) }}" method="POST">
                        @csrf
                        <button class="text-white p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                            <i class="fas fa-eye {{ Auth::check() && Auth::user()->watched->contains($movie_data->id) ? 'text-green-500' : '' }}"></i>
                        </button>
                    </form>
                    @livewire('add-movie-to-list', ['movieId' => $movie_data->id])

                    <!-- Flash Messages -->
                    {{-- <div class="mt-4"> --}}
                        @if (session('success'))
                        <div id="flashMessage" class="bg-green-500 text-white px-4 py-2 rounded mt-2">
                            {{ session('success') }}
                        </div>
                    @elseif (session('danger'))
                        <div id="flashMessage" class="bg-red-600 text-white px-4 py-2 rounded mt-2">
                            {{ session('danger') }}
                        </div>
                    @endif
                    {{-- </div> --}}
                    
                </div>
                
                <!-- Reviews Section -->
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold mb-6">Write a Review</h2>
                    <button id="toggleReviewForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Write a Review
                    </button>
                    <div id="reviewForm" class="mt-4 hidden">
                        @livewire('add-reviews', ['movie_id' => $movie_data->id])
                    </div>
                @endauth
                    <h2 class="text-2xl font-semibold mt-8 mb-6">Reviews</h2>
                    <div class="space-y-4">
                        @livewire('display-reviews', ['movie_id' => $movie_data->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.getElementById('toggleReviewForm').addEventListener('click', function () {
        var reviewForm = document.getElementById('reviewForm');
        reviewForm.classList.toggle('hidden');
    });

    function toggleLists() {
        var lists = document.getElementById('lists');
        lists.classList.toggle('hidden');
    }

    const flashMessage = document.getElementById('flashMessage');
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.transition = 'opacity 1s';
            flashMessage.style.opacity = '0';
            setTimeout(() => {
                flashMessage.remove();
            }, 1000);
        }, 3000);
    }
</script>
@endsection