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
            {{-- @foreach ($categorias as $c)
               <option value="{{$c->id_categoria}}">{{$c->nombreCategoria}}-{{$c->niveles_id}}</option>
             @endforeach --}}
         </select>
         <select name="" id="select-question" class="mt-5">
            <option value="" selected>pregunta</option>
            {{-- @foreach ($preguntas as $p)
               <option value="{{$p->id_preguntas}}">{{$p->pregunta}}</option>
             @endforeach --}}
         </select>
         <select name="" id="select-responses" class="mt-5">
            <option value="" selected>respuestas</option>
            {{-- @foreach ($respuestas as $r)
               <option value="{{$r->id_respuesats}}">{{$r->respuesta}}</option>
             @endforeach --}}
        </select>
     </div>


     <script src="{{asset('js/select-dinamico.js')}}"></script>
@endsection