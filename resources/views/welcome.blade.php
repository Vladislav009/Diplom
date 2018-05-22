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
      <a href="{{ url('/home') }}">Home</a>
      @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
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
              
                  {{$category->questions()->get()}}
             </div>
           </div>
         </div>
       </div>
       @endforeach
     

       


       <div class="panel-body col-sm-3">
        <h4>Задать свой вопрос</h4>
         <form action="@if(empty($entity)){{ route('questions.store') }}@else{{ route('questions.update', $entity->id) }}@endif" method="post">

          {{ csrf_field() }}
          @isset($entity)
          {{ method_field('PUT') }}
          @endisset
          <div class="row">
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            @include('admin.fields.select', ['field' => 'category_id', 'name' => 'Category', 'options' => $categories])
          </div>
          <input class="btn btn-primary btn-lg" type="submit" value="save"> 

        </form>
      </div>
  </div>
  </div>




</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
