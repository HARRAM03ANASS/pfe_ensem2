@extends('master.layout')

@section('title','Lists')
@section('content')
<form action="{{ route('add.list') }}" method="POST" class="max-w-sm mx-auto">
    @csrf
    <div class="mt-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 ">Name:</label>
        <input type="text" name="name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mt-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 ">Description:</label>
        <input type="text" name="description" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mt-6">
        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>    
    </div>
</form>
@endsection
