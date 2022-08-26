<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>millonSena</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/categories.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-12 d-flex">
        <nav class="col-12 d-flex flex-row justify-content-end bg-transparent gap-2 shadow-lg">
                 <div class="col-12 d-flex flex-row justify-content-end gap-2 p-2">
                    <p class="text-warning">{{Auth()->user()->name}}</p>
                    <p class="text-warning bi bi-currency-bitcoin">0</p>
                 </div>
                <video autoplay muted loop id="videoBG" class="d-fluid">
                    <source src="/video/4K_24.mp4" type="video/mp4">
                </video>
        </nav>

    </div>
    <div class="col-12">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
