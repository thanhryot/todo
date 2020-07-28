@extends('frontend_v1.app')


@section('main')

{{ $todo->item }}
<hr>
<input type="checkbox" @if($todo->is_done) checked @endif>

@endsection