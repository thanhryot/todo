@extends('frontend_v1.app')


@section('main')
<div class="row">
	<div class="col-md-8">
		<form class="form-group" action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
			 {{ method_field('PUT') }}
			{{ csrf_field() }}
			<label for="item">Item: </label>
			<input type="text" class="form-control" value="{{ $todo->item }}" name="item">
			<br>
			<button type="submit" class="btn btn-info">Update</button>
		</form>
	</div>
</div>
@endsection