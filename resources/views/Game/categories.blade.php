@extends('layouts.nav')
@section('content')
     <div class="col-12 d-flex flex-column justify-content-center" >
         <form action="{{route('guardarpartida')}}"method="POST">
          
           <select name="" id="select-nivel" class="form-select">
            <option value="" selected>Seleccione Nivel</option>
            @foreach ($niveles as $n)
               <option value="{{$n->id_niveles}}">{{$n->nivel}}</option>
             @endforeach
           </select>
          

         </form>
         <select name="" id="select-category" class="mt-5">
            <option value="" selected>Seleccione la Categoria</option>
         </select>
         <select name="" id="select-question" class="mt-5">
            <option value="" selected>pregunta</option>
         </select>
         <select name="" id="" class="mt-5">
            <option value="" selected>respuestas</option>
        </select>
     </div>


     <script src="{{asset('js/select-dinamico.js')}}" type="text/javascript"></script>
@endsection