@extends('frontend_v1.app')

@section('main')



<div class="row">
	<div class="col-md-4 col-12">
		<h1>Login</h1>
		@include('frontend_v1.include.form-error')
		<form action="{{ route('login') }}" method="post" class="form-group">
			{{ csrf_field() }}
		    <label for="email"><b>Email</b></label>
		    <input class="form-control" type="text" placeholder="Email" name="email">
			<br>
		    <label for="password"><b>Password</b></label>
		    <input class="form-control" type="password" placeholder="Password" name="password">
			<br>
		    <button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>


@endsection