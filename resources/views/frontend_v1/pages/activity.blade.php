@extends('frontend_v1.app')


@section('main')

<p>My Activities</p>
<table class="table table-hover table-striped table-responsive">
	<tr>
		<th class="w-20">Time</th>
		<th class="w-80">Description</th>
	</tr>

	@foreach($activities as $activity)
	<tr>
		<td>{{ $activity->created_at->diffForHumans() }}</td>
		<td>{{ $activity->content }}</td>
	</tr>
	@endforeach
	
</table>

{{ $activities->links() }}


@endsection