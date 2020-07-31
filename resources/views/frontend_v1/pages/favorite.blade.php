@extends('frontend_v1.app')


@section('main')

<p>My Favorite</p>

@if(count($favorites))
<a href="{{ route('favorite.clear') }}" class="text-danger">Clear all</a>
<ol>
@foreach($favorites as $favorite)
	<li><i>{{ $favorite }}</i></li>
@endforeach
</ol>

@else

<p><i>You don't have nothing favorite in here.</i></p>

@endif

@endsection