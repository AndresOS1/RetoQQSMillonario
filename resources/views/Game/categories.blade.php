@extends('layouts.nav')
@section('content')
     <div class="col-12 d-flex flex-column justify-content-center" >
         <form action="{{route('guardarpartida')}}"method="POST">
          
           <select name="" id="" class="form-select">
            <option value="" selected>nieveles</option>
            @foreach ($niveles as $n)
               <option value="{{$n->id_niveles}}">{{$n->niveles}}</option>
             @endforeach
           </select>
          

         </form>
         <select name="" id="">
            <option value="" selected>categorias</option>
         </select>
         <select name="" id="">
            <option value="" selected>pregunta</option>
         </select>
         <select name="" id="">
            <option value="" selected>respuestas</option>
        </select>
     </div>
@endsection