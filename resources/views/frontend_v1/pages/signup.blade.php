@extends('frontend_v1.app')

@section('main')

@include('frontend_v1.include.form-error')

<form action="{{ route('signup') }}" method="post">
	 {{ csrf_field() }}
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Username" name="name">
	<br>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Email" name="email">
	<br>
	<label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password">
	<br>
    <button type="submit">Signup</button>
</form>

@endsection