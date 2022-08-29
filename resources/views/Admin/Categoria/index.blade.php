@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center flex-row flex-column">
    <div class="col-12">
        <a class="btn bi bi-clipboard2-plus fs-1x" href="{{route('Categorias.create')}}"></a>
    </div>
    @if($categorias->count())
    <table class="table table-striped table-">
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