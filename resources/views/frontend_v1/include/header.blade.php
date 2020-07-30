<div class="pt-3">
	@if(auth()->user())

	Hello, <b>{{ auth()->user()->name }}</b> |

	<a href="{{ route('todos.index') }}">Todo Lists</a> |
	
	<a href="{{ route('activity.index') }}">Activities Log</a> |

	<a href="{{ route('logout') }}">Logout</a>
	@else

	<a href="{{ route('login') }}">Login</a> | <a href="{{ route('signup') }}">Signup</a>

	@endif
</div>
