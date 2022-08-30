@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center flex-column align-items-center">
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Respuestas
    </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Respuestas a la Pregunta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('Respuestasupdate',$respuestas->id_respuestas)}}" method="POST">
                   @csrf
                   <div class="w-100 d-flex justify-content-center aligin-items-center flex-wrap">
                    <input type="text" class="form-control"  placeholder="respuesta" name="respuesta" value="{{$respuestas->respuesta}}">
                     <label for="" class="form-control-label">Escribe la respuesta</label>
                   </div>
    
                   <div class="w-100 d-flex justify-content-center aligin-items-center flex-wrap">
                     <select  id="" name="resultado"class="form-select" value="{{$respuestas->resultado}}">
                        <option value="1">Correcta</option>
                        <option value="0">Falsa</option>
                     </select>
                    <label for="" class="form-control-label">Resultado esperado</label>
                   </div>
                   
                   <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                    <select class="form-select" name="pregunta_id"  required value="{{$respuestas->pregunta_id}}">
                        <option value="{{$respuestas->pregunta_id}}">seleccione la pregunta</option>
                        @foreach($preguntasAll as $p)
                           <option selected value="{{$p->id_preguntas}}">{{$p->pregunta}}</option>
                        @endforeach
                    </select>
                   </div>
                
    
                  
              
                </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    
    <div class="col-12 d-flex justify-content-center aligin-items-center flex-column align-items-center">
        <div class="w-100 d-flex justify-content-start">
            <a href="{{route('Preguntas.index')}}" class="btn bi bi-arrow-left-circle-fill fs-1"></a>
        </div>
        <div class="col-5 justify-content-center d-flex gap-3 flex-column   ">
    
            <form action="{{'Preguntasupdate',$preguntas->id_preguntas}}" method="POST" class="">
                @method('PUT')
                {{ csrf_field() }}
                    <div class="w-100 d-flex justify-content-center aligin-items-center">
                           <h1>Crear Pregunta</h1>     
                    </div>
                    <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                           <input type="text" class="form-control" placeholder="Escribe la pregunta" name="pregunta" required value="{{$preguntas->pregunta}}">
                    </div>
                    <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                      <select   class="form-select" name="categoria_id" required>
                          {{-- <option selected value="{{$preguntas->categoria_id}}">{{$preguntas->categoria_id}}</option> --}}
                          @foreach($categorias as $c)
                             @if ($preguntas->categoria_id == $c->id_preguntas)
                                 <option selected value="{{$preguntas->categoria_id}}">{{ $c->nombreCategoria}}</OPTION>
                             @endif
                             <option value="{{$c->id_categorias}}">{{$c->nombreCategoria}}--nivel {{$c->niveles_id}}</option>
                          @endforeach
                      </select>
                  </div>
                    <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                             <button class="btn btn-primary">guardar</button>
                    </div>
            </form>
        </div>
    
    </div>
</div>
@endsection