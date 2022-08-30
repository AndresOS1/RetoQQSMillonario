@extends('layouts.nav')
@section('content')
     <div class="col-12 d-flex flex-column">
        <section class="col-12 d-flex justify-content-center aligin-items-center flex-wrap mt-5">
            <div class="casilla col-12 img-fluid d-flex justify-content-center text-break">
                 <div class="text-breack p-4">
                    <h1 class="text-white opacity-75" style="font-size: 4vw; ">{{$preguntaAleatoria->pregunta}}</h1>
                 </div>
            </div>
     </div>
@endsection