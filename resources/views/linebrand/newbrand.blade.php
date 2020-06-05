@extends('layouts.app')

@section('template_title')
  Nueva Marca
@endsection


@section('content')
    
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Crear Marca
                <div class="pull-right">
                  <a href="{{ route('lineas_marcas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Marcas
                  </a>
                </div>

              </div>

              <div class="card-body">
                  <form action="{{ route('ruta_new_brand') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }} nav-font">
                      {!! Form::label('name', 'Marca', array('class' => 'col-md-3 control-label')); !!}
                      <div class="col-md-9">
                          <div class="input-group">
                              {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control general-input', 'placeholder' => 'Nombre de Marca...', 'required'=>'required')) !!}
                              
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
                              {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control general-input', 'placeholder' => 'Descripción', 'required'=>'required')) !!}
                              
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
                                <select class="general-input custom-select form-control js-example-basic-multiple" name="question[]" id="question"  multiple="multiple" required="required">
                                    <option value="" disabled="disabled">Seleccione Preguntas</option>
                                    @if ($questions)
                                        @foreach($questions as $question)
                                            <option value="{{ $question->id }}">{{ $question->question_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                
                            </div>
                            @if ($errors->has('question[]'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('question[]') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('image_brand[]') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('image_brand[]', 'Imagen de Marca', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                <label class="lb-img radio-b" style="background-color: #6cbbcb;">
                                    <img class="brand-img" src="/images/hospital.png" />
                                    <input type="radio" name="image" value="/images/hospital.png|#6cbbcb"/>
                                </label>
                                <label class="lb-img radio-b" style="background-color:#8db81b ;">
                                    <img class="brand-img" src="/images/medicine.png" />
                                    <input type="radio" name="image" value="/images/medicine.png|#8db81b"/>
                                </label>
                                <label class="lb-img radio-b" style="background-color: #f51d3f;">
                                    <img class="brand-img" src="/images/tablet.png" />
                                    <input type="radio" name="image" value="/images/tablet.png|#f51d3f"/>
                                </label>
                                <label class="lb-img radio-b" style="background-color:#f7c100;">
                                    <img class="brand-img" src="/images/drug.png" />
                                    <input type="radio" name="image" value="/images/drug.png|#f7c100"/>
                                </label>
                            </div>
                            @if ($errors->has('image_brand[]'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image_brand[]') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    @permission('create.brand')
                    <div class="form-group has-feedback row  nav-font">
                        <div class="col-md-12 text-center"> 
                            <button type="submit" class="btn btn-success btn-cr-brand ">
                            Crear Nueva Marca
                            </button>  
                        </div>
                    </div>
                    @endpermission
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
        $('.js-example-basic-multiple').select2();

    
    });
    document.getElementsByClassName('lb-img').onclick = changeColor;   

    function changeColor() {
        document.body.style.color = "purple";
        return false;
    } 

</script>
@endsection