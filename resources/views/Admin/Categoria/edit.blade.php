@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center">
    <div class="col-5 justify-content-center d-flex gap-3">
        <form action="{{route('Categoriasupdate',$categorias->id_categorias)}}" method="POST">
            @method('PUT')
            @csrf
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <h1>Editar categoria</h1>     
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <input type="text" class="form-control" placeholder="nombre de la categora" name="nombreCategoria" value="{{$categorias->nombreCategoria}}">
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                    <select  class="form-select" name="niveles_id">
                        <option value="{{$categorias->niveles_id}}"selected>{{$categorias->niveles_id}}</option>
                        @foreach($niveles as $n)
                           <option value="{{$n->id_niveles}}">{{$n->nivel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                         <button class="btn btn-primary">Editar</button>
                </div>
        </form>
    </div>

</div>
@endsection