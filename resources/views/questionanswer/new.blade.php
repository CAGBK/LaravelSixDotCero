<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Crear Preguntas</div>

              <div class="card-body">
                  <form action="{{ route('ruta_new_question') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row">
                          <label for="question" class="col-md-4 col-form-label text-md-right">Pregunta</label>
                          <div class="col-md-4">
                              <input id="question" type="text" class="form-control" name="question" required autofocus>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Estado Pregunta') }}</label>
                        <select class="form-control col-form-label text-md-right col-md-4 @error('state_id')  is-invalid @enderror" name="state_id" id="state_id">
                                <option value="" >Seleccione un Estado</option>
                            @foreach ($states as $stat)
                                <option value="{{$stat->id}}" >{{$stat->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 1</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        @foreach ($statesanswer as $state)
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="0">
                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                            </div>
                         @endforeach
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 2</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        @foreach ($statesanswer as $state)
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="1">
                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                            </div>
                         @endforeach
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 3</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        @foreach ($statesanswer as $state)
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="2">
                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                            </div>
                         @endforeach
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 4</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        @foreach ($statesanswer as $state)
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="3">
                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                            </div>
                         @endforeach
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
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script type="application/javascript">
    $( "input" ).on( "click", function() {
    $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
    });
</script>
@endsection
