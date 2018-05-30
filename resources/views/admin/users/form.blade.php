@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@if(empty($entity))
				<div class="panel-heading"><h2>Добавить нового пользователья</h2></div>
				@else
				<div class="panel-heading"><h2>Редактировать пользователя</h2></div>
				@endif
				<div class="panel-body">
					<form action="@if(empty($entity)){{ route('users.store') }}@else{{ route('users.update', $entity->id) }}@endif" method="post">
						{{ csrf_field() }}
						@isset($entity)
						{{ method_field('PUT') }}
						@endisset
						<div class="row">
							@include('admin.fields.text', ['field' => 'name', 'name' => 'Имя'])
							@include('admin.fields.email', ['field' => 'email', 'name' => 'Email'])
							@include('admin.fields.password', ['field' => 'password', 'name' => 'Пароль'])

						</div>
						<input class="btn btn-primary btn-lg" type="submit" value="Сохранить">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
