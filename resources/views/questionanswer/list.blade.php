@extends('home')
@section('content')
<div class="container">
  <section class="text-center col-md-12 col-sm-12">
    <h2>Preguntas y Respuestas</h2>
  </section>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-default">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Preguntas 
            </span>
            <span class="">
              <a href="{{ route('create_question')}}"><i class="fas fa-plus"></i> Crear Pregunta y Respuestas</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            @foreach ($questions as $question)
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <span class="badge badge-light">
                    Pregunta: <strong>{{$question->question_name}}</strong>
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
                      <th>Numero de Pregunta</th>
                      <th>Descripcion</th>
                      <th>Estado</th>
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
</div>
@endsection