@if(auth()->user())

Hello, {{ auth()->user()->name }}

<a href="{{ route('logout') }}">Logout</a>
@else

<a href="{{ route('login') }}">Login</a> | <a href="{{ route('signup') }}">Signup</a>

@endif