@extends('master.layout')
@section('title','profile')
@section('content')

    <div class="flex flex-col items-center bg-gray-800 shadow overflow-hidden p-6">
      <img class="h-28 w-28 rounded-full" src="{{ $user->profile_photo_url }}" alt="Profile Image">
      <h1 class="mt-4 text-2xl text-gray-100 whitespace-normal font-bold">{{$user->name}}</h1>
      <div class="mt-4 mb-2">
        @auth
          @if(auth()->id() !== $user->id)
            @livewire('follow-button', ['user' => $user])
          @endif
        @endauth
      </div>
      
      <div class="mt-2 flex space-x-6 text-sm">
        <div class="flex flex-col items-center">
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">{{$watchedCount}}</span>
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">watched</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">{{$watchlistCount}}</span>
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">watchlist</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">{{$listas}}</span>
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">Lists</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">{{$followingCount}}</span>
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">Following</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">{{$followersCount}}</span>
          <span class="text-gray-100 whitespace-normal dark:text-gray-40">Followers</span>
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
@endsection
