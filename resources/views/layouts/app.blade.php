<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script>
        window.App = {!! json_encode([
            'signedIn'  => Auth::check(), 
            'user'      => Auth::User()
        ]) !!};
    </script>

</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <main class="py-4">
            @yield('content')
        </main>
        {{-- <flash message="Message"></flash> --}}
        <flash message="{{session('flash')}}"></flash>
    </div>
    
</body>
</html>
