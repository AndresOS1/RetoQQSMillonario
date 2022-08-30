@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center flex-column align-items-center">
    <div class="w-100 d-flex justify-content-start">
        <a href="{{route('Categorias.index')}}" class="btn bi bi-arrow-left-circle-fill fs-1"></a>
    </div>
    <div class="col-5 justify-content-center d-flex gap-3 flex-column   ">

        <form action="{{'Categorias.store'}}" method="POST" class="">
            @csrf
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <h1>Crear categoria</h1>     
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center">
                       <input type="text" class="form-control" placeholder="nombre de la categora" name="nombreCategoria" required>
                </div>
                <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                    <select   class="form-select" name="niveles_id" required>
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