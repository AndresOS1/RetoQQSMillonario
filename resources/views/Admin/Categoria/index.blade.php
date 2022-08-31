@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center flex-row flex-column">
    <div class="col-12 d-flex align-items-center">
        <a class="btn bi bi-clipboard2-plus fs-2 d-flex " href="{{route('Categorias.create')}}"></a>
          <form action="{{route('Categorias.index')}}" method="GET" >
            @csrf
            <div class="input-group mb-3 d-flex align-items-center mt-3">
                <input type="text" class="form-control" placeholder="buscar categorias" aria-label="Recipient's username" aria-describedby="basic-addon2" name="buscar">
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-search-heart-fill"></i></span>
            </div>
        </form>
    </div>
    @if($categorias->count())
    <table class="table table-striped    table-hover">
        <thead class="table-responsive">
            <tr>
                <th>ID</th>
                <th>CATEGORIAS</th>
                <th>Nivel</th>
            </tr>
        </thead>
        <tbody>
                @foreach($categorias as $c)
                  <tr>
                    <td>{{ $c->id_categorias}}</td>
                     <td>{{ $c->nombreCategoria}}</td> 
                     @foreach ($niveles as $n)
                       @if ($c->niveles_id == $n->id_niveles)
                          <td>{{ $n->nivel }}</td>
                        @endif
                     @endforeach
                  
                    <td class="d-flex justify-content-end">
                        <a href="{{route('editarcategoria',$c->id_categorias)}}" class="btn bi bi-pencil-fill"></a>

                    </td>
                    <td>
                        <form action="{{route('eliminarcategoria',$c->id_categorias)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn bi bi-trash3-fill"></button>
                        </form>
                    </td>
                    @endforeach
                  </tr>
        </tbody>
    </table>
    
    @else
    <h1>No Hay</h1>
    @endif
</div>
@endsection