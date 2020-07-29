@extends('frontend_v1.app')

@section('main')


<div class="row">
    <div class="col-md-4 col-12">
        <h1>Signup</h1>
        @include('frontend_v1.include.form-error')
        <form action="{{ route('signup') }}" method="post" class="form-group">
        	 {{ csrf_field() }}
            <label for="name"><b>Username</b></label>
            <input type="text" class="form-control" placeholder="Username" name="name">
        	<br>
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Email" name="email">
        	<br>
        	<label for="password"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        	<br>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
</div>

@endsection