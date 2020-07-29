@extends('frontend_v1.app')


@section('main')
<div class="row">
	<div class="col-md-8">
		<form action="{{ route('todos.store') }}" method="POST" class="form-group">
			{{ csrf_field() }}
			<label for="item">Add Item: </label>
			<input type="text" class="form-control" placeholder="Enter the to-do list..." name="item"><br>
			<button type="submit" class="btn btn-success">Add</button>
		</form>
	</div>
</div>


@endsection