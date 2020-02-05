<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Permisos</div>
                @foreach ($users as $user)
                <div class="card-body">
                    <form action="{{ route('ruta_update_role',['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
  
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                            <div class="col-md-6">
                              <input id="nombre" type="text" class="form-control" name="nombre" readonly="readonly" value="{{$user->names}} {{$user->surnames}}">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">Rol:</label>
                          <div class="col-md-6">
                              <select name="rol" id="rol" class="form-control">
                                  @foreach ($roles as $role)
                                  <option value="{{$role->name}}">{{$role->name}}</option>
                                  @endforeach
                              </select>
                          </div>
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
                @endforeach
          </div>
      </div>
  </div>
</div>
@endsection
