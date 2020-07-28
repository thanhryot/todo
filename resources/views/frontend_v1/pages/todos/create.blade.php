@extends('frontend_v1.app')


@section('main')

<form action="{{ route('todos.store') }}" method="POST">
	{{ csrf_field() }}
	<label for="item">Add Item: </label>
	<input type="text" placeholder="Enter the to-do list..." name="item">
	<button type="submit">Add</button>
</form>

@endsection