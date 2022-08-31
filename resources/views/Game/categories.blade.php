@extends('layouts.nav')
@section('content')
     <div class="col-12 d-flex flex-column justify-content-center" >
         <form action="{{route('guardarpartida')}}"method="POST">
          
           <select name="" id="" class="form-select">
            <option value="" selected>nieveles</option>
            @foreach ($niveles as $n)
               <option value="{{$n->id_niveles}}">{{$n->nivel}}</option>
             @endforeach
           </select>
          

         </form>
         <form action="{{route('all')}}" method="post" id="form1">
            @csrf
            <select name="" id="">
                <option value="" selected>categorias</option>
                <option value="1">uno</option>
             </select>
         </form>

         <select name="" id="">
            <option value="" selected>pregunta</option>
         </select>
         <select name="" id="">
            <option value="" selected>respuestas</option>
        </select>
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
     <script>
        $(document).ready(function(){
            $.ajax({
                url: '/all',
                method:'post',
                data:$("#form1").serialize(),
            }).done(function(res){
                alert(res);
            });
        });
     </script>
@endsection