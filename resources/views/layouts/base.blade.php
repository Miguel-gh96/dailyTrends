<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>DailyTrends</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700,800,900" rel="stylesheet">      -->

        <!-- Third Libraries -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700,800,900" rel="stylesheet">   -->
        <link href="{{ url('/css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">        
            @include('layouts/header')
            @yield('content')
            @include('layouts/footer')        
        </div>  
    </body> 
    <!-- <script src="{{ url('/js/app.js') }}"></script> -->
</html>
