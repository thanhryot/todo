<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TodoApp</title>
       
        {{-- <link rel="stylesheet" href="css/style.css"> --}}
    </head>
    <body>

        {{-- header --}}

            @include('frontend_v1.include.header')

        {{-- end header --}}


        {{-- main body--}}
            <hr>

            @yield('main')
            
            <hr>
        {{-- end main body --}}

        {{-- footer --}}

            @include('frontend_v1.include.footer')

        {{-- end footer --}}


        {{-- <script src="js/app.js"></script> --}}
    </body>
</html>
