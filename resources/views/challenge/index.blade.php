@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection
@section('content')

<div class="">
    <div class="">
        <div class="">
            <div class="">
              	<div class="">
					  <form action="{{ route('create_challenge') }}" method="POST" id="msform">
						@csrf	
					<!-- progressbar -->
					<div class="banner-challenge ">
	                    <ul id="progressbar">
	                        <li class="active" id="account"><strong></strong></li>
	                        <li id="payment"><strong></strong></li>
	                        <li id="confirm"><strong></strong></li>
	                	</ul>
					</div>
					<div class="container">
						<fieldset>
							<div class="form-card">
	                            <div class="row">
	                                <div class="col-12">
										<h2 class="fs-title">Crear Desafío</h2>
										<h2 class="fs-title-text">Selecciona participantes a los que invitar.</h2>
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
														<tr class="tr-challenge">
															<td>
																<input id="{{ $user->id }}" name="check_user[]" type="checkbox" value="{{ $user->id }}" >
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
										<h2 class="fs-title">Tipo de Desafío</h2>
										<h2 class="fs-title-text">Seleccione la marca.</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row {{ $errors->has('brand_id') ? ' has-error ' : '' }} nav-font">
			                        <div class="col-md-12">
										<table id="brands-check" class="table ">
											<thead>
												<tr >
													<th style="display:none;">
														a
													</th>
												</tr>
											</thead>
											@if ($subcategories)
												<tbody>
													@foreach($subcategories as $subcategory)
														<tr class="tr-challenge-two">
															<td>
																<input id="{{ $subcategory->id }}" name="check_subcategory[]" type="checkbox" value="{{ $subcategory->id }}" >
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
										<h2 class="fs-title">Confirmación del Desafío</h2>
										<h2 class="fs-title-text">Seleccione la marca.</h2>
	                                </div>
								</div> 
								<div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('name', 'Nombre de Desafío', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Pregunta...')) !!}
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
								<div class="form-group has-feedback row {{ $errors->has('number_questions') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('number_questions', 'Cantidad de Preguntas', array('class' => 'col-md-3 control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            {!! Form::number('number_questions', NULL, array('id' => 'number_questions', 'class' => 'form-control', 'placeholder' => 'Pregunta...')) !!}
                                            <div class="input-group-append">
                                                <label for="number_questions" class="input-group-text">
                                                    <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }} nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('number_questions'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('number_questions') }}</strong>
                                            </span>
                                        @endif
                                    </div>
								</div>
								<div class="form-group has-feedback row {{ $errors->has('challenge_time') ? ' has-error ' : '' }} nav-font">
                                    {!! Form::label('challenge_time', 'Duración del Desafío', array('class' => 'col-md-3 date-time-ch control-label')); !!}
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
												<input type="text" class="form-control datetimepicker-input" name="end_date" data-target="#datetimepicker1" required/>
												<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
                                        </div>
                                        @if ($errors->has('challenge_time'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('challenge_time') }}</strong>
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
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif

	                            <table id="challenge-check" class="table ">
									<thead>
										<tr style="display:none;">
											<th>
												a
											</th>
										</tr>
									</thead>
									@if ($subcategories)
										<tbody>
											@foreach($subcategories as $subcategory)
												<tr class="tr-challenge-three">
													<td>
														<input id="{{ $subcategory->id }}" name="check_subcategory" type="checkbox" value="{{ $subcategory->id }}" >
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
	                        </div> 
	                          <button type="submit" class="btn next action-button">Confirmar!</button> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
					</div>
	                </form>
              	</div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
 

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
   <!-- jQuery -->
   <script type="application/javascript"  src="//code.jquery.com/jquery.js"></script>
   <!-- DataTables -->
   <script   type="application/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
   <!-- Bootstrap JavaScript -->
   <script  type="application/javascript"  src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

@section('footer_scripts')

    @include('scripts.challenge')

@endsection