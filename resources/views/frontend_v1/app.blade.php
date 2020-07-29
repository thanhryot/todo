<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TodoApp</title>

        <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            {{-- header --}}
                
                @include('frontend_v1.include.header')

            {{-- end header --}}


            {{-- main body--}}

                <hr>

                @if(auth()->check())
                    <div class="mb-3"><a href="{{ route('todos.create') }}" class="btn btn-success">Add new</a></div>
                @endif
                
                @yield('main')
                
                <hr>
            {{-- end main body --}}

            {{-- footer --}}

                @include('frontend_v1.include.footer')

            {{-- end footer --}}

        </div>        
    </body>
</html>
