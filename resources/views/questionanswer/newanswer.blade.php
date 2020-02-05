<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Respuestas</div>

              <div class="card-body">
                  <form action="{{ route('ruta_new_answer') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta</label>
                        <div class="col-md-6">
                            <input id="answer" type="text" class="form-control" name="answer" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">{{ __('Estado Respuesta') }}</label>
                      <select class="form-control col-form-label text-md-right col-md-6 @error('state_id')  is-invalid @enderror" name="state_id" id="state_id">
                              <option value="" >Seleccione un Estado</option>
                          @foreach ($states as $state)
                              <option value="{{$state->id}}" >{{$state->state}}</option>
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
@endsection
