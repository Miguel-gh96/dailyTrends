<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>DailyTrends</title>
        <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>        
            @include('layouts/header')
            @yield('content')
            @include('layouts/footer')        
        </div>  
    </body>     
</html>
