@extends('frontend_v1.app')


@section('main')

<p>My Favorite</p>

<ol>
@foreach($favorites as $favorite)
	<li><i>{{ $favorite }}</i></li>
@endforeach
</ol>


@endsection