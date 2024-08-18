<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('./imgs/icons8-ticket-24.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    
    @yield('style')
    @livewireStyles
</head>

<body>
    @include('master.navbar')
    <div>
        @yield('content')
    </div>



    @yield('script')
    @livewireScripts
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @include('master.footer')
</body>
</html>