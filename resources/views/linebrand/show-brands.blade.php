@extends('layouts.app')

@section('template_title')
  Ver Marca
@endsection


@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              Detalle Marca
              <div class="float-right">
                <a href="{{ route('lineas_marcas') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Volver a las preguntas">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Volver a las Marcas
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="clearfix"></div>
            <div class="border-bottom"></div>
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Pregunta:
              </strong>
            </div>
            <div class="col-sm-7">
              {{$subcategory->name}}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Respuestas:
              </strong>
            </div>

            <div class="col-sm-7">
                @foreach($subcategory->questions as $question)
                  <span class="badge text-white" style="background-color: {{$question->state->color}}">{{$question->question_name}}</span>
                @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Creado:
              </strong>
            </div>

            <div class="col-sm-7">
              {{$subcategory->created_at}}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Modificado:
              </strong>
            </div>

            <div class="col-sm-7">
              {{$subcategory->updated_at}}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
