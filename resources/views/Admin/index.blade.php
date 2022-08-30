<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
  <body>
    <section class="d-flex flex-row flex-wrap">
        <div class="col-md-3 border rounded-3 shadow-lg p-3 h-auto bg-black col-12 gap-2">
             <div class="w-100 d-flex justify-content-center flex-row flex-column">
                <span class="bi bi-currency-bitcoin text-white m-auto" style="font-size: 4vw;"></span>
             </div>
             <div class="w-100 d-flex justify-content-center flex-row flex-column aligin-items-center">
                <h1 class="d-flex justify-content-center text-white">millonario</h1>
             </div>
             <a href="{{route('Categorias.index')}}" class="btn w-100 justify-content-center bi bi-bookmark-check-fill text-white">
                Categorias 
             </a>
             <a href="{{route('Preguntas.create')}}" class="btn w-100 justify-content-center bi bi-question-circle-fill text-white">
                Preguntas
             </a>
             
             <div class="d-flex w-100 h-50 align-items-end justify-content-center pb-2" >
              <form id="logout-form" action="{{ url('logout') }}" method="POST">
                {{ csrf_field() }}
                  <button type="submit">Logout</button>
              </form>   
              </div>
             </div>


        </div>
        <div class="col-md-9" style="height: 100vh;">
            <div class="col-12 d-flex justify-content-end p-2 gap-3 ">
                <p>{{auth()->user()->name}}</p>
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div class="col-12 border-2 p-2 shadow-lg h-75">
                 @yield('content')
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>