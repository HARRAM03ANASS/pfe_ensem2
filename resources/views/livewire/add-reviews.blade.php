<div class="relative">
    <!-- Notification Pop-ups -->
    {{-- @if (session('success') || session('error'))
    <div id="notification-container" class="fixed top-4 right-4 z-50">
        @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg mb-4 transition-transform transform translate-y-0" id="success-notification">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-lg mb-4 transition-transform transform translate-y-0" id="error-notification">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M9 17h6M10 7h4v4h-4V7zm-4 10h12v2H6v-2z"></path>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
        @endif
    </div>
    @endif --}}

    <!-- Review Form -->
    <div class="max-w-md mx-auto mt-8 p-6 bg-gray-800 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-white mb-4">Write Your Review</h2>
        <form wire:submit.prevent="addReview">
            <textarea wire:model="content" class="w-full p-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 border border-gray-600 focus:border-blue-500 focus:outline-none transition-all" placeholder="Write your review..."></textarea>
            @error('content') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4 transition-all">Submit</button>
        </form>
    </div>
</div>
