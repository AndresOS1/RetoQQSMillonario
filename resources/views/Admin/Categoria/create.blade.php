@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center">
    <div class="col-5 justify-content-center d-flex gap-3">
        <form action="{{'Categorias.store'}}" method="POST">
            @csrf
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <h1>Crear categoria</h1>     
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <input type="text" class="form-control" placeholder="nombre de la categora" name="nombreCategoria">
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                    <select  class="form-select" name="niveles_id">
                        <option value=""selected>seleccione el nivel de la categoria</option>
                        @foreach($niveles as $n)
                           <option value="{{$n->id_niveles}}">{{$n->nivel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                         <button class="btn btn-primary">guradar</button>
                </div>
        </form>
    </div>

</div>
@endsection