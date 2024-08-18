{{-- @extends('master.layout')

@section('title','profile')
@section('content')
    <div class="flex flex-col items-center bg-gray-800 shadow overflow-hidden p-6">
      <img class="h-32 w-32 rounded-full" src="https://via.placeholder.com/150" alt="Profile Image">
      <h1 class="mt-4 text-2xl font-bold">altesse</h1>
      <div class="mt-2 flex space-x-6 text-sm">
        <div class="flex flex-col items-center">
          <span class="font-medium">308</span>
          <span>Films</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">41</span>
          <span>This Year</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">2</span>
          <span>Lists</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">9</span>
          <span>Following</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">9</span>
          <span>Followers</span>
        </div>
      </div>
      
      <div class="mt-6 w-full">
        <h2 class="text-xl font-semibold">Favorite Films</h2>
        <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-4">
          <img src="https://via.placeholder.com/150" alt="Favorite Film" class="w-full h-auto rounded">
          <img src="https://via.placeholder.com/150" alt="Favorite Film" class="w-full h-auto rounded">
          <img src="https://via.placeholder.com/150" alt="Favorite Film" class="w-full h-auto rounded">
          <img src="https://via.placeholder.com/150" alt="Favorite Film" class="w-full h-auto rounded">
        </div>
      </div>
    </div>

@endsection --}}








{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}
