@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					@if(empty($entity))
						<div class="panel-heading"><h2>Создать новый вопрос</h2></div>
					@else
						<div class="panel-heading"><h2>Редактировать вопрос</h2></div>
					@endif
					<div class="panel-body">
						<form action="@if(empty($entity)){{ route('questions.store') }}@else{{ route('questions.update', $entity->id) }}@endif" method="post">
							{{ csrf_field() }}
							@isset($entity)
								{{ method_field('PUT') }}
							@endisset
							<div class="row">
								@include('admin.fields.text', ['field' => 'title', 'name' => 'Вопрос'])
								@include('admin.fields.text', ['field' => 'name', 'name' => 'Имя'])
								@include('admin.fields.textarea', ['field' => 'body', 'name' => 'Ответ', 'rows' => 10])
								@include('admin.fields.select', ['field' => 'category_id', 'name' => 'Категория', 'options' => $categories])
								<div class="form-group row col-sm-10">
    								<label class="col-sm-2 col-form-label"></label>Действие</label>
    								<select class="form-control " name="isPublished">
      									<option value="1">Опубликовать</option>
      									<option value="2">Скрыть</option>
    								</select>
  								</div>

							</div>
							<input class="btn btn-primary btn-lg" type="submit" value="Сохранить">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
