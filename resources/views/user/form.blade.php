@extends('layouts.app')

@section('content')
<div class="panel-body col-sm-12">
    <h4>Задать свой вопрос</h4>
    <form action="{{ route('pages.store') }}" method="post">
      {{ csrf_field() }}
      <div>
        @include('admin.fields.text', ['field' => 'title', 'name' => 'Вопрос'])
        @include('admin.fields.text', ['field' => 'name', 'name' => 'Имя'])
        @include('admin.fields.select', ['field' => 'category_id', 'name' => 'Категория', 'options' => $categories])
      </div>
      <input class="btn btn-primary btn-lg" type="submit" value="Отправить"> 

    </form>
  </div>
  @endsection