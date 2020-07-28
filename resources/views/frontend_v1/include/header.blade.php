
@if(auth()->id())

Xin chào, {{ auth()->user()->name }}

<a href="{{ route('logout') }}">Đăng xuất</a>
@else

<a href="{{ route('login') }}">Đăng nhập</a> | <a href="{{ route('signup') }}">Đăng kí</a>

@endif