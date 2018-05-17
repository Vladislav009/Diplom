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

        @foreach($categories as $category)

        <div class="container">
            <div class="accordion" id="accordionExample">
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
                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
            </div>
        </div>
    </div>
</div>

@endforeach

<h4>Задать свой вопрос</h4>


<div class="panel-body">
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

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
