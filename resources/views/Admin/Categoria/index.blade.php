@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center">
    <table>
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
                       @if ($categorias->niveles_id == $n->id_nivles)
                          <td>{{ $n->nombre }}</td>
                        @endif
                    @endforeach
                @endforeach
        </tbody>
    </table>
</div>