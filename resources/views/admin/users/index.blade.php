@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>
				<div class="panel-body">
					@if($users->count() > 0)
					<table class="table">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Actions</th>
						</tr>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>
								<form action="{{ route('users.destroy', $user->id) }}" method="POST">
									<a type="button" class="btn btn-default" href="{{ route('users.edit', $user->id) }}">edit</a>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger">delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					@else
					No questions
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection