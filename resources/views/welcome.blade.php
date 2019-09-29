<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Home - Nuber</title>
        {{--  Fonts  --}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        {{--  Style  --}}
        <link href="{{ url('/').mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <bookings></bookings>
        </div>
        <script type="text/javascript">
            var app_url = '{{ url('/') }}';
        </script>
        <script src="{{ url('/').mix('js/app.js') }}"></script>
    </body>
</html>
