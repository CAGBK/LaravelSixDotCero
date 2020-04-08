@extends('layouts.app')

@section('template_title')
    Todas las Lineas y Marcas
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
  <div class="row ">
    <div class="col-md-6 col-lg-6">
      <div class="card card-login">
        <div class="card-header header-card ">
          <div class="text-white" style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Todas las Lineas
          </span>
          <div class="btn-group pull-right btn-group-xs">
              @permission('view.create.line')
              <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                  <span class="sr-only">
                      {!! trans('usersmanagement.users-menu-alt') !!}
                  </span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item nav-font" href="{{ route('create_line')}}">
                      <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                      Crear Linea
                  </a>
                  <a class="dropdown-item nav-font" href="/users/deleted">
                      <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                      Lineas Inactivas
                  </a>
              </div>
              @endpermission
          </div>
          </div>
        </div>
        <div class="card-body">

          @if(config('usersmanagement.enableSearchUsers'))
              @include('partials.search-users-form')
          @endif
          <div class="table-responsive users-table">
              <table class="table table-striped table-sm data-table">
                  <caption id="user_count" class="nav-font">
                      {{ trans_choice('linebrandmanagement.linebrand-table.captionline', 1, ['linescount' => $categories->count()]) }}
                  </caption>
                  <thead class="thead">
                      <tr>
                          <th>Nombre Linea</th>
                          <th>Marcas</th>
                          <th>Creado</th>
                          <th>Modificado</th>
                          <th>Acción</th>
                          <th class="no-search no-sort"></th>
                          <th class="no-search no-sort"></th>
                      </tr>
                  </thead>
                  <tbody id="users_table">
                      @foreach($categories as $category)
                          <tr>
                              <td>{{$category->name}}</td>
                              <td>
                                @if($category->subcategory)
                                <?php 
                                $arraySubcategory = json_decode($category->subcategory);
                                ?>
                                @foreach ($arraySubcategory as $value)
                                  @foreach ($subcategories as $subcategory)
                                    <span class="badge badge-info">{{ $value == $subcategory->id ? $subcategory->name : ''  }}</span>
                                  @endforeach
                                @endforeach 
                                @endif
                              </td>
                              </td>
                              <td class="hidden-sm hidden-xs hidden-md">{{$category->created_at}}</td>
                              <td class="hidden-sm hidden-xs hidden-md">{{$category->updated_at}}</td>
                              @role('admin')
                              <td>
                                  {!! Form::open(array('url' => 'line/' . $category->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                      {!! Form::hidden('_method', 'DELETE') !!}
                                      {!! Form::button(trans('linebrandmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Linea', 'data-message' => '¿Estás seguro de que deseas eliminar a esta Linea?')) !!}
                                  {!! Form::close() !!}
                              </td>
                              @endrole
                              @permission('detail.line')
                              <td>
                                  <a class="btn btn-sm btn-success btn-block" href="{{ route('show_line',['id' => $category->id]) }}" data-toggle="tooltip" title="Show">
                                      {!! trans('linebrandmanagement.buttons.show') !!}
                                  </a>
                              </td>
                              @endrole('detail.line')
                              @permission('view.edit.line')
                              <td>
                                  <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('line/' . $category->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                      {!! trans('linebrandmanagement.buttons.edit') !!}
                                  </a>
                              </td>
                              @endpermission
                          </tr>
                      @endforeach
                  </tbody>

              </table>
          </div>
      </div> 
        </div>
      </div>
    <div class="col-md-6">
      <div class="card card-login">
        
        <div class="card-header header-card">
          <div class="text-white" style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Todas las Marcas
          </span>

          <div class="btn-group pull-right btn-group-xs">
            @permission('view.create.brand')
              <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                  <span class="sr-only">
                      {!! trans('usersmanagement.users-menu-alt') !!}
                  </span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item nav-font" href="{{ route('create_brand')}}">
                      <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                      Crear Marca
                  </a>
                  <a class="dropdown-item nav-font" href="/users/deleted">
                      <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                      Marcas Inactivas
                  </a>
              </div>
            @endpermission
          </div>
          </div>
        </div>
        <div class="card-body">

          @if(config('usersmanagement.enableSearchUsers'))
              @include('partials.search-users-form')
          @endif
          <div class="table-responsive users-table">
              <table class="table table-striped table-sm data-table">
                  <caption id="user_count" class="nav-font">
                      {{ trans_choice('linebrandmanagement.linebrand-table.caption', 1, ['brandscount' => $subcategories->count()]) }}
                  </caption>
                  <thead class="thead">
                      <tr>
                          <th>Nombre Marca</th>
                          <th>Preguntas</th>
                          <th>Creado</th>
                          <th>Modificado</th>
                          <th>Acción</th>
                          <th class="no-search no-sort"></th>
                          <th class="no-search no-sort"></th>
                      </tr>
                  </thead>
                  <tbody id="users_table">
                      @foreach($subcategories as $subcategory)
                          <tr>
                              <td>{{$subcategory->name}}</td>
                              <td>
                                @if ($subcategory->question)  
                                <?php 
                                $arrayQuestion = json_decode($subcategory->question);
                                ?>
                                @foreach ($arrayQuestion as $value)
                                  @foreach ($questions as $question)
                                    <span class="badge text-white" style="background-color: {{ $question->state->color }}">{{ $value == $question->id ? $question->question_name : ''  }}</span>
                                  @endforeach
                                @endforeach 
                                @endif
                              </td>
                              </td>
                              <td class="hidden-sm hidden-xs hidden-md">{{$subcategory->created_at}}</td>
                              <td class="hidden-sm hidden-xs hidden-md">{{$subcategory->updated_at}}</td>
                              @role('admin')
                              <td>
                                  {!! Form::open(array('url' => 'brand/' . $subcategory->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                      {!! Form::hidden('_method', 'DELETE') !!}
                                      {!! Form::button(trans('linebrandmanagement.buttonsbrand.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Marca', 'data-message' => '¿Estás seguro de que deseas eliminar a esta Marca?')) !!}
                                  {!! Form::close() !!}
                              </td>
                              @endrole
                              @permission('detail.brand')
                              <td>
                                  <a class="btn btn-sm btn-success btn-block" href="{{ route('show_brand',['id' => $subcategory->id]) }}" data-toggle="tooltip" title="Show">
                                      {!! trans('linebrandmanagement.buttonsbrand.show') !!}
                                  </a>
                              </td>
                              @endpermission
                              @permission('view.edit.brand')
                              <td>
                                  <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('brand/' . $subcategory->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                      {!! trans('linebrandmanagement.buttonsbrand.edit') !!}
                                  </a>
                              </td>
                              @endpermission
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