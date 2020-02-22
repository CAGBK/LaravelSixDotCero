@extends('layouts.app')

@section('template_title')
    Todas las preguntas
@endsection

@section('template_linked_css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-login">
                    <div class="card-header header-card text-white">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Todas las preguntas
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('usersmanagement.users-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item nav-font" href="{{ route('create_question')}}">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Crear Pregunta
                                    </a>
                                    <a class="dropdown-item nav-font" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Preguntas Inactivas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if(config('usersmanagement.enableSearchUsers'))
                            @include('partials.search-users-form')
                        @endif
                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count" class="nav-fonct">
                                    {{ trans_choice('questionsmanagement.questions-table.caption', 1, ['questionscount' => $questions->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>Pregunta</th>
                                        <th>Respuestas</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th>Acción</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{$question->question_name}}</td>
                                            <td>
                                            @foreach($question->answers as $answer)
                                              <span class="badge text-white" style="background-color:{{$answer->state->color}}">{{$answer->name}}</span>
                                            @endforeach</td>
                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$question->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$question->updated_at}}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'question/' . $question->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('questionsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Pregunta', 'data-message' => '¿Estás seguro de que deseas eliminar a esta pregunta?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ route('show_question',['id' => $question->id]) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('questionsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('question/' . $question->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('questionsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')

    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')

@endsection