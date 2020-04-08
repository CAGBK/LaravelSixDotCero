@extends('layouts.app')

@section('template_title')
    Editar Marca
@endsection
@section('content')
    
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Actualizar Marca
                <div class="pull-right">
                  <a href="{{ route('lineas_marcas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Marcas
                  </a>
                </div>

              </div>

              <div class="card-body">
                {!! Form::model($brand,['route' => ['update_brand', $brand->id], 'method' => 'put']) !!}
                @csrf

                      <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }} nav-font">
                      {!! Form::label('name', 'Marca', array('class' => 'col-md-3 control-label')); !!}
                      <div class="col-md-9">
                          <div class="input-group">
                              {!! Form::text('name', $brand->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre de Marca...')) !!}
                              <div class="input-group-append">
                                  <label for="name" class="input-group-text">
                                      <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>

                    <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }} nav-font">
                      {!! Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label')); !!}
                      <div class="col-md-9">
                          <div class="input-group">
                              {!! Form::text('description', $brand->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción')) !!}
                              <div class="input-group-append">
                                  <label for="description" class="input-group-text">
                                      <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    
                    <div class="form-group has-feedback row {{ $errors->has('question[]') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('question[]', 'Preguntas', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control js-example-basic-multiple" name="question[]" id="question"  multiple="multiple" >
                                    <option value="0">Seleccione Preguntas</option>
                                    @if ($brand->question)
                                         @foreach($questions as $question)
                                                <option value="{{ $question->id }}">{{ $question->question_name }}</option>
                                            @endforeach
                                        @else 
                                            @foreach($questions as $question)
                                                <option value="{{ $question->id }}">{{ $question->question_name }}</option>
                                            @endforeach    
                                    @endif
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="question[]">
                                        <i class="{{ trans('forms.create_user_icon_role') }} nav-font" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('question[]'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('question[]') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    @permission('edit.brand')
                    <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                      Actualizar Marca
                    </button>  
                    @endpermission
                    {!! Form::close() !!}
                </div>
          </div>
      </div>
  </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    @if($brand->question)

        var arrayJS=<?php echo $brand->question;?>;
        
        $('#question').val(arrayJS).trigger('change.select2');
    @endif

});
</script>
@endsection

