<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Asignar Preguntas A Respuestas</div>

              <div class="card-body">
                  <form action="{{ route('ruta_new_question_answer') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                        <label for="exampleInputEmail1">Pregunta</label>
                        <select name="question" id="question" class="form-control js-example-basic-single" >
                            <option value="" >Seleccione una Pregunta</option>
                            @foreach ($questions as $question)
                            <option value="{{$question->id}}">{{$question->question_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Respuesta</label>
                        <select name="answer[]" id="answer" class="form-control js-example-basic-multiple"  multiple="multiple" >
                            @foreach ($answers as $answer)               
                            <option style="background-color:{{$answer->state->color}}!important;" value="{{$answer->id}}">{{$answer->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Guardar
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
