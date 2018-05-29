@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Категории</div>
				<div class="panel-body">
					@if($categories->count() > 0)
					<table class="table">
						<tr>
							<th>ID</th>
							<th>Категория</th>
							<th>Всего</th>
							<th>Опубликовано</th>
							<th>Без ответа</th>
							<th>Действия</th>
						</tr>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->title }}</td>
							<td>{{$category->questions->count()}}</td>
							<td>{{$category->questions->where('status', 'Опубликован')->count()}}</td>
							<td>{{$category->questions->where('status', 'Без ответа')->count()}}</td>
							<td>
								<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
									<a type="button" class="btn btn-default" href="{{ route('categories.edit', $category->id) }}">Изменить</a>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger">Удалить</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					@else
						Нет категорий
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
