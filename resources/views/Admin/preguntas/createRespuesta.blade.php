@extends('Admin.index')
@section('content')
@include('sweetalert::alert')
<div class="col-12 d-flex justify-content-center aligin-items-center flex-column align-items-center">
<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Preguntas
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear pregunta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('Respuestas.store')}}" method="POST">
               @csrf
               <div class="w-100 d-flex justify-content-center aligin-items-center flex-wrap">
                <input type="text" class="form-control" placeholder="respuesta" name="respuesta">
                 <label for="" class="form-control-label">escribe la respuesta</label>
               </div>

               <div class="w-100 d-flex justify-content-center aligin-items-center flex-wrap">
                 <select  id="" name="resultado"class="form-select">
                    <option value="1">correcta</option>
                    <option value="0">falsa</option>
                 </select>
                <label for="" class="form-control-label">Resultado esperado</label>
               </div>
               
               <div class="w-100 d-flex justify-content-center aligin-items-center mt-3">
                <select   class="form-select" name="pregunta_id">
                    <option value=""selected>seleccione la pregunta</option>
                    @foreach($preguntas as $p)
                       <option value="{{$p->id_preguntas}}">{{$p->pregunta}}</option>
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

</div>
@endsection