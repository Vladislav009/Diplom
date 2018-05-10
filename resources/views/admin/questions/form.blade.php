@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					@if(empty($entity))
						<div class="panel-heading"><h2>Create new question</h2></div>
					@else
						<div class="panel-heading"><h2>Edit question</h2></div>
					@endif
					<div class="panel-body">
						<form action="@if(empty($entity)){{ route('questions.store') }}@else{{ route('questions.update', $entity->id) }}@endif" method="post">
							{{ csrf_field() }}
							@isset($entity)
								{{ method_field('PUT') }}
							@endisset
							<div class="row">
								@include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
								@include('admin.fields.text', ['field' => 'slug', 'name' => 'Slug'])
								@include('admin.fields.textarea', ['field' => 'body', 'name' => 'Body', 'rows' => 10])
								@include('admin.fields.select', ['field' => 'category_id', 'name' => 'Category', 'options' => $categories])
							</div>
							<input class="btn btn-primary btn-lg" type="submit" value="save">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection