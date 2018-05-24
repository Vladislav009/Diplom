<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FAQ</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
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



    <div class="container">

      <div class="row">
       @foreach($categories as $category)
       <div class="accordion col-sm-6" id="accordionExample">
         <div class="card">
           <div class="card-header" id="headingOne">
             <h5 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$category->id}}" aria-expanded="true" aria-controls="{{$category->id}}">
                {{$category->title}}
              </button>
            </h5>
          </div>
          <div id="{{$category->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
           <div class="card-body">
             <ol>
              @foreach($category->questions as $question)
              @if(isset($question->body))
              <li>{{$question->title}} <a  class="btn btn-success" data-toggle="modal" data-target="#answModal">Ответ</a></li> 
              @endif
              @endforeach
            </ol> 
          </div>
        </div>
      </div>
    </div>
    @endforeach

       <!--
        Модальное окно ответа
      -->

      <div class="modal fade" id="answModal" tabindex="-1" role="dialog" aria-labelledby="answModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="answModlLabel">Ответ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>





      <div class="panel-body col-sm-3">
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
      </div>
    </div>
  </div>




</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
