@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-login">
            	<div class="card-header header-card  text-white">
	                Creación de Desafios
	                <div class="pull-right">
	                  <a href="{{ route('lineas_marcas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
	                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
	                      Voler a la Lista de Desafios
	                  </a>
	                </div>
              	</div>
              	<div class="card-body">
              		<form action="{{ route('ruta_new_line') }}" method="POST" id="msform">
                    <!-- progressbar -->
	                    <ul id="progressbar">
	                        <li class="active" id="account"><strong>Participantes</strong></li>
	                        <li id="payment"><strong>Marcas</strong></li>
	                        <li id="confirm"><strong>Save</strong></li>
	                    </ul>
	                    <div class="progress">
	                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	                    </div> <br> <!-- fieldsets -->
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Selecciona participantes a los que desea invitar</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 1 - 3</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row {{ $errors->has('user_id') ? ' has-error ' : '' }} nav-font">
			                        <div class="col-md-12">
										<table id="users-check" class="table ">
											<thead>
												<tr>
													<th>
														a
													</th>
												</tr>
											</thead>
											@if ($users)
												<tbody>
													@foreach($users as $user)
														<tr>
															<td>
																<input id="{{ $user->id }}" name="check-user" type="checkbox" value="{{ $user->id }}" >
																@if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1 )
																<img name="img-user" src="{{ $user->profile->avatar}}" alt="{{ $user->name}}" class="user-avatar-nav user-challenge">
																@else
																<img class="user-avatar-nav user-challenge">
																@endif
																<label name="name-user" class="label-challenge" for="">{{ $user->name }} </label>		
															</td>
														</tr>
													@endforeach
												</tbody>
													@endif
			                                    </label>
											</table>
												@if ($errors->has('user_id'))
													<span class="help-block">
														<strong>{{ $errors->first('user_id') }}</strong>
													</span>
												@endif
			                        </div>
			                    </div>
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccióne Marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 2 - 3</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row {{ $errors->has('brand_id') ? ' has-error ' : '' }} nav-font">
			                        <div class="col-md-12">
										<table id="brands-checkgit " class="table ">
											<thead>
												<tr>
													<th>
														a
													</th>
												</tr>
											</thead>
											@if ($subcategories)
												<tbody>
													@foreach($subcategories as $subcategory)
														<tr>
															<td>
																<input id="{{ $subcategory->id }}" name="check-subcategory" type="checkbox" value="{{ $subcategory->id }}" >
																@if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1 )
																<img name="img-subcategory" src="{{ $subcategory->profile->avatar}}" alt="{{ $subcategory->name}}" class="subcategory-avatar-nav subcategory-challenge">
																@else
																<img class="subcategory-avatar-nav subcategory-challenge">
																@endif
																<label name="name-subcategory" class="label-challenge" for="">{{ $subcategory->name }} </label>		
															</td>
														</tr>
													@endforeach
												</tbody>
													@endif
			                                    </label>
											</table>
			                            @if ($errors->has('role'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('role') }}</strong>
			                                </span>
			                            @endif
			                        </div>
			                    </div>
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccione marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 3 - 4</h2>
	                                </div>
	                            </div> 
	                            <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> 
	                            <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
	                        </div> 
	                          <button type="submit" class="btn next action-button">Confirmar!</button> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                </form>
              	</div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
 
<script type="application/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
	$(document).ready(function() {
				$('.select-user').select2();	
			$('.select-brand').select2();	
			$('.select-line').select2();	
		});	
	
</script>
@endsection

@section('footer_scripts')

    @include('scripts.challenge')

@endsection