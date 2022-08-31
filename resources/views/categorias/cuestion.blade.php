@extends('layouts.nav')
@section('content')
     <div class="col-12 d-flex flex-column">

              <section class="col-12 d-flex justify-content-center aligin-items-center flex-wrap mt-5">
                    <div class="casilla col-12 img-fluid d-flex justify-content-center text-break">
                         <div class="text-breack p-4">
                            <h1 class="text-white opacity-75" style="font-size: 4vw; ">Categorias</h1>
                         </div>
                    </div>
                    <div class="d-flex justify-center align-items-center col-12 text-break mt-5 flex-wrap gap-5">
                      @foreach ($categorias as $c)
                          <div class="casilla col-12 img-fluid d-flex justify-content-center">
                            <div class="tex-break p-2">
                              <a class="link " style="font-size: 2vw" href="#">{{$c->nombreCategoria}}</a>
                            </div> 
                          </div>    
                      @endforeach


                      <div class="col-12 img-fluid d-flex justify-content-center">
                          <a class="bi bi-arrow-right-circle-fill flecha opacity-50" href="{{route('juego')}}"></a>
                      </div>

                    </div>

              </section>


     </div>
@endsection