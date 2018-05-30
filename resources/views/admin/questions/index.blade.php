@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Вопросы</div>
				<div class="panel-body">
					@if($questions->count() > 0)
					<table class="table">
						<tr>
							<th>Категория</th>
							<th>Вопрос</th>
							<th>Имя</th>
							<th>Дата</th>
							<th>
								<a  href="{{url('/sort')}}">Статус</a>
							</th>
							<th>Действие</th>
						</tr>
						@foreach($questions as $post)
						<tr>
							<td>{{ $post->category->title}}</td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->name}}</td>
							<td>{{ $post->created_at }}</td>
							<td>
								{{ $post->status}}
							</td>
							<td>
								<form action="{{ route('questions.destroy', $post->id) }}" method="POST">
									<a type="button" class="btn btn-default" href="{{ route('questions.edit', $post->id) }}">Изменить</a>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger">Удалить</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					@else
					Нет вопросов
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
