<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Actualizar Linea
                <div class="pull-right">
                  <a href="{{ route('lineas_marcas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Lineas
                  </a>
                </div>

              </div>

              <div class="card-body">
                {!! Form::model($category,['route' => ['update_line', $category->id], 'method' => 'put']) !!}
                      @csrf

                    <div class="form-group has-feedback row {{ $errors->has('line') ? ' has-error ' : '' }} nav-font">
                      {!! Form::label('line', 'Linea', array('class' => 'col-md-3 control-label')); !!}
                      <div class="col-md-9">
                          <div class="input-group">
                              {!! Form::text('line', $category->name, array('id' => 'line', 'class' => 'form-control', 'placeholder' => 'Nombre de Linea...')) !!}
                              <div class="input-group-append">
                                  <label for="line" class="input-group-text">
                                      <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          @if ($errors->has('line'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('line') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }} nav-font">
                        {!! Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label')); !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('description', $category->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción de Linea...')) !!}
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
                                    @if ($category->subcategories)
                                    @foreach($subcategories as $subcategory)
                                           <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                       @endforeach
                                   @else 
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
                    <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                      Actualizar Linea
                    </button>
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
$('.js-example-basic-single').select2();
});
@if($subcategorycat)
        @foreach($subcategorycat as $subcategory)
        <?php $subcategory2[] = $subcategory ;?>
        @endforeach
        
        var arrayJSs=<?php echo json_encode($subcategory2);?>;
        console.log(arrayJSs)
        
            $('#subcategories').val(arrayJSs).trigger('select2:clearing');
    @endif    
$(document).ready(function() {
    <?php $subcategory2 = array(); ?>
    $('.js-example-basic-multiple').select2();
    @if($category->subcategories)
        @foreach($category->subcategories as $subcategory)
        <?php $subcategory2[] = $subcategory->id ;?>
        @endforeach
        
        var arrayJS=<?php echo json_encode($subcategory2);?>;
        console.log(arrayJS)
        
            $('#subcategories').val(arrayJS).trigger('change.select2');
    @endif

});

</script>
@endsection