@extends('frontend_v1.app')


@section('main')

@if(count($todo_lists))
<table class="table table-hover table-striped table-responsive">
	<tr>
		<th class="w-25">Order</th>
		<th class="w-25">Item</th>
		<th class="w-25">Status</th>
		<th class="w-25">Action</th>
	</tr>

	@foreach($todo_lists as $todo_list)
	<tr>
		<td>{{ $loop->iteration }}</td>
		<td><a href="{{ route('todos.show', ['todo' => $todo_list->id]) }}">{{ $todo_list->item }}</a></td>
		<td>
			<form action="{{ route('todo.switch', ['id' => $todo_list->id]) }}">
				<input type="checkbox" onchange="this.form.submit()" @if($todo_list->is_done) checked @endif>
			</form>
		</td>
		<td>
			<form style="display: inline-block;" action="{{ route('todos.edit',['todo' => $todo_list->id]) }}">
				<input type="submit" value="Edit" class="btn btn-small btn-info">
			</form>

			<form style="display: inline-block;" action="{{ route('todos.destroy',['todo' => $todo_list->id]) }}" method="POST">
	 			{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="submit" value="Delete" class="btn btn-small btn-danger">
			</form>
		</td>
	</tr>

	@endforeach
</table>

{{-- pagination --}}
{{ $todo_lists->links() }}

@endif

@endsection