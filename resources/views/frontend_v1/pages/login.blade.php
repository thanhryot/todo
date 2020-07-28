@extends('frontend_v1.app')

@section('main')

@include('frontend_v1.include.form-error')

<form action="{{ route('login') }}" method="post">
	{{ csrf_field() }}
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email">
	<br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password">
	<br>
    <button type="submit">Login</button>
</form>

@endsection