@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					@if(empty($entity))
						<div class="panel-heading"><h2>Создать новую категорию</h2></div>
					@else
						<div class="panel-heading"><h2>Редактирование категории</h2></div>
					@endif
					<div class="panel-body">
						<form action="@if(empty($entity)){{ route('categories.store') }}@else{{ route('categories.update', $entity->id) }}@endif" method="POST">
							{{ csrf_field() }}
							@isset($entity)
								 {{ method_field('PUT') }}
							@endisset
							<div class="row">
								@include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
							</div>
							<input class="btn btn-primary btn-lg" type="submit" value="Сохранить">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
