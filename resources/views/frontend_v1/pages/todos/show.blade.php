@extends('frontend_v1.app')


@section('main')

<h1>{{ $todo->item }}</h1>
@if($todo->is_done)

<p class="text-success">Finished !!</p>
@else

<p class="text-warning">Unfinished !!</p>

@endif


@endsection