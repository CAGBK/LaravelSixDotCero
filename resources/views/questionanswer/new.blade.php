@extends('layouts.app')

@section('template_title')
    Preguntas y Respuestas
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card card-login">
                    <div class="card-header header-card text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Crear preguntas y respuestas
                            <div class="pull-right">
                                <a href="{{ route('preguntas_respuestas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Voler a la Lista de Preguntas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('ruta_new_question') }}" method="POST">
                                @csrf
                                <div class="form-group has-feedback row {{ $errors->has('question') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('question', 'Pregunta', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('question', NULL, array('id' => 'question', 'class' => 'form-control', 'placeholder' => 'Pregunta...')) !!}
                                            <div class="input-group-append">
                                                <label for="question" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('question'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('question') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('state_id') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('state_id', 'Estado', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="state_id" id="state_id">
                                                <option value="">Seleccione estado</option>
                                                @if ($states)
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="state_id">
                                                    <i class="{{ trans('forms.create_user_icon_role') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('role'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('answer[]') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('answer[]', 'Respuesta 1', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Pregunta...')) !!}
                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach ($statesanswer as $state)
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="0">
                                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                                            </div>
                                        @endforeach
                                        @if ($errors->has('answer[]'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('answer[]') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('answer[]') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('answer[]', 'Respuesta 2', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 2')) !!}
                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach ($statesanswer as $state)
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="1">
                                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                                            </div>
                                        @endforeach
                                        @if ($errors->has('answer[]'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('answer[]') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('answer[]') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('answer[]', 'Respuesta 3', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 3')) !!}
                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach ($statesanswer as $state)
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="2">
                                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                                            </div>
                                        @endforeach
                                        @if ($errors->has('answer[]'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('answer[]') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('answer[]') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('answer[]', 'Respuesta 4', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 4')) !!}
                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach ($statesanswer as $state)
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="3">
                                                <label class="form-check-label" for="{{$state->state}}">{{$state->state}}</label>
                                            </div>
                                        @endforeach
                                        @if ($errors->has('answer[]'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('answer[]') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row {{ $errors->has('cquestion_id') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('cquestion_id', 'Categoria de Pregunta', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="cquestion_id" id="cquestion_id">
                                                <option value="">Seleccione categoria de pregunta</option>
                                                @if ($cquestions)
                                                    @foreach($cquestions as $cquestion)
                                                        <option value="{{ $cquestion->id }}">{{ $cquestion->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="cquestion_id">
                                                    <i class="{{ trans('forms.create_user_icon_role') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('role'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                @permission('create.question')
                                <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                                    Crear Nueva Pregunta
                                </button>  
                                @endpermission
                            </form>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')

  @include('scripts.toggleStatus')

@endsection