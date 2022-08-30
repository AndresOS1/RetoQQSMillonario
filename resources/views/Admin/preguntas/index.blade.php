@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
    <div class="col-12 d-flex justify-content-center aligin-items-center flex-column align-items-center">
        <div class="col-12">
            <a class="btn bi bi-clipboard2-plus fs-1x" href="{{route('Preguntas.create')}}"></a>
        </div>
        @if($preguntas->count())
        <table class="table table-striped table-">
            <thead class="table-responsive">
                <tr>
                    <th>ID</th>
                    <th>PREGUNTA</th>
                    <th>CATEGORIA</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($preguntas as $p)
                      <tr>
                        <td>{{$p->id_preguntas}}</td>
                         <td>{{$p->pregunta}}</td> 
                         @foreach ($categorias as $c)
                            @if ($p->categoria_id == $c->id_categorias)
                              <td>{{ $c->nombreCategoria}}</td>
                            @endif
                         @endforeach    
                        <td class="d-flex justify-content-end">
                            <a href="{{route('editarpregunta',$p->id_preguntas)}}" class="btn bi bi-pencil-fill"></a>    
                        </td>
                        <td>
                            <form action="{{route('eliminarpregunta',$p->id_preguntas)}}" method="POST">
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