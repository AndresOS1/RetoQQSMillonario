<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/home.css">
    <title>millonSena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

      <section class="col-12 d-flex flex-column">
            
            <div class="Title col-12 d-flex flex-column text-white align-items-center justify-content-center">
                <h1 class="opacity-75" style="font-size:5rem; ">WHO NEEDS </h1> 
                <h1 style="font-size:5rem; " class="opacity-75">TO BE A</h1>  
                <h1 style="font-size:5rem; " class="opacity-75"><strong>MILLIONARIE?</strong></h1>
            </div>
            <div class="body col-12 d-flex justify-content-center aligin-items-center gap-3">
              @if (Route::has('login'))
                @auth
                  <a class="btn btn-primary" href="{{route('playCategoria')}}">Play</a>
                @else
                   <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                   <a class="btn btn-primary" href="{{ route('register') }}">Register</a>               
                @endif
                @endauth
              @endif
            </div>
            <video onloadedmetadata="this.muted=true" autoplay loop id="videoBG">
              <source src="video/Comp_8.mp4" type="video/mp4">
            </video>
             <audio controls  loop>
                <source src="{{asset('sound/millonario.mp3')}}" type="audio/mpeg">
             </audio>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>