@extends('home')
@section('content')
<div class="container">
  <section class="text-center col-md-12 col-sm-12">
    <h2>Lineas  y Marcas</h2>
  </section>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-default">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Lineas
            </span>
            <span class="">
              <a href="{{ route('create_line')}}"><i class="fas fa-plus"></i> Crear Linea</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <span class="badge badge-light">
                    Pregunta: <strong>{{$category->question_name}}</strong>
                </span>
                <div class="text-right">
                  <span class="badge badge-pill badge-success">
                    <small>
                      1 Pregunta
                    </small>
                  </span>
                  <span class="badge badge-pill badge-primary">
                    <small>
                      # permisos
                    </small>
                  </span>
                </div>
              </div>
              <div id="collapse_roles_1" class="collapse" data-parent="#accordion_roles_1" >
                <table class="table table-striped table-sm mt-3">
                  <caption>
                    Nombre
                  </caption>
                  <thead>
                    <tr>
                      <th>User id</th>
                      <th>User Name</th>
                      <th>user email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>id</td>
                      <td>name</td>
                      <td>email</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </li>
              @endforeach 
            </ul>
          </div>
        </div>
      </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Marcas
            </span>
            <span class="">
              <a href="{{ route('create_brand')}}"><i class="fas fa-plus"></i> Crear Marca</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            @foreach ($subcategories as $subcategory)
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <i class="fas fa-plus"> {{$subcategory->name}}</i> 
                <div class="text-right">
                  <span class="badge badge-pill badge-success">
                    <small>
                      1 Usuarios
                    </small>
                  </span>
                  <span class="badge badge-pill badge-primary">
                    <small>
                      # permisos
                    </small>
                  </span>
                </div>
              </div>
            </li>
            @endforeach 
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Activar Lineas
            </span>
            <span>
              <a href="{{ route('create_question_answer')}}"><i class="fas fa-plus"></i> Relacionar Lineas - Marcas</a>
            </span>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Linea</th>
                <th>Marca</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->question_name}}</td>
                <td>
                   @foreach ($category->answers as $item)
                    <span style="background-color:{{$subcategory->state->color}}!important;" class="badge badge-primary">{{$item->name}}</span>
                  @endforeach
                </td>
              </tr>
              @endforeach             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Activar Lineas
            </span>
            <span>
            </span>
          </div>
        </div>
        <div class="card-body">
            I'm .
        </div>
      </div>
    </div>
  </div>
</div>
@endsection