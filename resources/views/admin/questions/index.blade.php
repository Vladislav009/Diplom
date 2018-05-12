@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Questions</div>
					<div class="panel-body">
						@if($questions->count() > 0)
							<table class="table">
								<tr>
									<th>ID</th>
									<th>Category</th>
									<th>Title</th>
									<th>Date</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
								@foreach($questions as $post)
									<tr>
										<td>{{ $post->id }}</td>
										<td>{{ $post->category->title}}</td>
										<td>{{ $post->title }}</td>
										<td>{{ $post->created_at }}</td>
										<td>
											@if(!empty($post->body))
											Опубликован
											@else
											Ожидает ответа
											@endif
										</td>
										<td>
											<form action="{{ route('questions.destroy', $post->id) }}" method="POST">
												<a type="button" class="btn btn-default" href="{{ route('questions.edit', $post->id) }}">edit</a>
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