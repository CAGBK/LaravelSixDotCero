<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Linea</div>

              <div class="card-body">
                  <form action="{{ route('ruta_new_line') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group has-feedback row {{ $errors->has('brand') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('brand', 'Linea', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('brand', NULL, array('id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Nombre de Linea...')) !!}
                                <div class="input-group-append">
                                    <label for="brand" class="input-group-text">
                                        <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('brand'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('brand') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción de Linea...')) !!}
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
                    <div class="form-group has-feedback row {{ $errors->has('state_id') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('state_id', 'Marca', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control js-example-basic-multiple" name="subcategories[]" id="subcategories"  multiple="multiple" >
                                    <option value="">Seleccione una Marca</option>
                                    
                                    @if ($subcategories)
                                    
                                    
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
$('.js-example-basic-single').select2();
});

$(document).ready(function() {
$('.js-example-basic-multiple').select2();
});
</script>
@endsection
