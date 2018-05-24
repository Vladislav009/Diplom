<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FAQ</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <script src="{{ asset('js/modernizr.js') }}"></script>
</head>
<body>
  <header>
    <h1>FAQ</h1>
    <div class="flex-center position-ref full-height">
      @if (Route::has('login'))
      <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Панель управления</a>
        @else
        <a href="{{ route('login') }}">Войти</a>
        <a href="{{ route('register') }}">Регистрация</a>
        @endauth
      </div>
      @endif
    </div>
    </header>
    @if($categories->count() > 0)
    <section class="cd-faq">
      <ul class="cd-faq-categories">
        @foreach($categories as $category)
        <li><a class="selected" href="#{{$category->id}}">{{$category->title}}</a></li>
        @endforeach
      </ul> <!-- cd-faq-categories -->

      <div class="cd-faq-items">
        @foreach($categories as $category)
        <ul id="{{$category->id}}" class="cd-faq-group">
          <li class="cd-faq-title"><h2>{{$category->title}}</h2></li>
          @foreach($category->questions as $question)
          @if(isset($question->body))
          <li>
            <a class="cd-faq-trigger" href="#{{$category->id}}">{{$question->title}}</a>
            <div class="cd-faq-content">
              <p>{{$question->body}}</p>
            </div> <!-- cd-faq-content -->
          </li>
          @endif
          @endforeach
        </ul> <!-- cd-faq-group -->
        @endforeach
      </div> <!-- cd-faq-items -->
      <a href="#0" class="cd-close-panel">Close</a>
    </section> <!-- cd-faq -->
    @else
    <p>Тут пусто</p>
    @endif


      <!-- <div class="panel-body col-sm-3">
        <h4>Задать свой вопрос</h4>
        <form action="@if(empty($entity)){{ route('questions.store') }}@else{{ route('questions.update', $entity->id) }}@endif" method="post">

          {{ csrf_field() }}
          @isset($entity)
          {{ method_field('PUT') }}
          @endisset
          <div class="row">
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Вопрос'])
            @include('admin.fields.text', ['field' => 'name', 'name' => 'Имя'])
            @include('admin.fields.select', ['field' => 'category_id', 'name' => 'Категория', 'options' => $categories])
          </div>
          <input class="btn btn-primary btn-lg" type="submit" value="Отправить"> 

        </form>
      </div> -->






      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/jquery.mobile.custom.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script> <!-- Resource jQuery -->
    </body>
    </html>
