@extends('frontend_v1.app')


@section('main')

<form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
	 {{ method_field('PUT') }}
	{{ csrf_field() }}
	<label for="item">Item: </label>
	<input type="text" value="{{ $todo->item }}" name="item">
	<button type="submit">Update</button>
</form>

@endsection