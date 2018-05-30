@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Администраторы</div>
				<div class="panel-body">
					@if($users->count() > 0)
					<table class="table">
						<tr>
							<th>Имя</th>
							<th>Email</th>
							<th>Действия</th>
						</tr>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{$user->email}}</td>
							<td>
								<form action="{{ route('users.destroy', $user->id) }}" method="POST">
									<a type="button" class="btn btn-default" href="{{ route('users.edit', $user->id) }}">Изменить</a>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger">Удалить</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					@else
					Нет администраторов
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
