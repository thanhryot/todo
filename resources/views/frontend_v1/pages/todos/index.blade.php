@extends('frontend_v1.app')


@section('main')

@if(count($todo_lists))
<table style="border-collapse: collapse;">
	<tr>
		<th>Order</th>
		<th>Item</th>
		<th>Status</th>
		<th>Action</th>
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
			<form action="{{ route('todos.edit',['todo' => $todo_list->id]) }}">
				<input type="submit" value="Edit" style="color: blue">
			</form>

			<form action="{{ route('todos.destroy',['todo' => $todo_list->id]) }}" method="POST">
	 			{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="submit" value="Delete" style="color: red">
			</form>
		</td>
	</tr>

	@endforeach
</table>

{{-- pagination --}}
{{ $todo_lists->links() }}

@endif

@endsection