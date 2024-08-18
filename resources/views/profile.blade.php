@extends('master.layout')

@section('title','profile')
@section('content')
    

    <div class="flex flex-col items-center bg-gray-800 shadow overflow-hidden p-6">
      <img class="h-28 w-28 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="Profile Image">
      <h1 class="mt-4 text-2xl font-bold">{{$user->name}}</h1>
      @if(auth()->id() !== $user->id)
            @if(auth()->user()->following->contains($user->id))
                <button id="followButton" class="ml-4 bg-red-500 text-white px-4 py-1 rounded" onclick="unfollowUser({{ $user->id }})">Unfollow</button>
            @else
                <button id="followButton" class="ml-4 bg-blue-500 text-white px-4 py-1 rounded" onclick="followUser({{ $user->id }})">Follow</button>
            @endif
        @endif
      <div class="mt-2 flex space-x-6 text-sm">
        <div class="flex flex-col items-center">
          <span class="font-medium">308</span>
          <span>watched</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">41</span>
          <span>watchlist</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">{{$listas}}</span>
          <span>Lists</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">{{$followingCount}}</span>
          <span>Following</span>
        </div>
        <div class="flex flex-col items-center">
          <span class="font-medium">{{$followersCount}}</span>
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
@endsection
