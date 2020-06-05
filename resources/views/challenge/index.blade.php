@extends('layouts.challenge')

@section('template_title')
  Crear Desafio
@endsection
@section('content')
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
        <fieldset id="checkArrayUsers">
            <div class="form-card">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fs-title">Crear Desafío</h2>
                        <h2 class="fs-title-text">Selecciona participantes a los que invitar!</h2>
                    </div>
                    
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('partials.form-status')
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback row {{ $errors->has('check_user') ? ' has-error ' : '' }} ">
                    <div class="col-md-12">
                        
                        <table id="users-check" class="table">
                            <thead>
                                <tr>
                                    <th class="sorting_asc">
                                        Usuarios
                                    </th>
                                    
                                </tr>
                            </thead>
                            <label class="label-info" for="" >Recuerda que si quieres participar del juego debes seleccionarte</label>
                            @if ($users)
                            <tbody>
                                @foreach($users as $user)
                                <tr class="tr-challenge">
                                    <td class="sorting">
                                        <label class="checkbox path">
                                            <input id="value-{{ $user->id }}" name="check_user[]" class="check_users" type="checkbox" value="{{ $user->id }}">
                                            <svg viewBox="0 0 21 21">
                                                <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                            </svg>
                                        </label>
                                        <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar-nav user-challenge">
                                        <label name="img-user" class="label-challenge" for="">{{ $user->name }} </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            </label>
                        </table>
                    </div>
                    @if ($errors->has('check_user'))
                        <span class="help-block ">
                            <strong >{{ $errors->first('check_user') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>
            <input id="btn-filter" type="button" name="next" class="next  btn-ch" value="Siguiente"/>
        </fieldset>
        <fieldset id="checkArrayBrands">
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Tipo de Desafío</h2>
                        <h2 class="fs-title-text">Seleccione la marca</h2>
                    </div>
                </div>
                <div class="form-group has-feedback row {{ $errors->has('check_subcategory') ? ' has-error ' : '' }} nav-font">
                    <div class="col-md-12">
                        <table id="brands-check" class="table">
                            <thead>
                                <tr>
                                    <th style="display:none;">

                                    </th>
                                </tr>
                            </thead>
                            @if ($subcategories)

                            <tbody>
                                @foreach($subcategories as $subcategory)

                                <tr class="tr-challenge-two" style="background-color:{{$subcategory->color_brand}};">
                                    <td class="sorting">
                                        <label class="checkbox-two path cs-check">
                                            <input id="subcategory-{{ $subcategory->id }}" class="check_brands" name="check_subcategory[]" type="checkbox" value="{{ $subcategory->id }}">
                                            <svg viewBox="0 0 21 21">
                                                <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                            </svg>
                                        </label>
                                        <img name="img-subcategory" src="{{ $subcategory->subcategory_image}}" alt="{{ $subcategory->subcategory_image}}" class=" subcategory-challenge">
                                        <label class="sub-name">{{$subcategory->name}}</label>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                            @endif
                            </label>
                        </table>
                        @if ($errors->has('check_subcategory'))
                        <span class="help-block">
	                            <strong>{{ $errors->first('check_subcategory') }}</strong>
	                        </span> @endif
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous btn-ch " value="Atras" />
            <input id="btn-filter-brands" type="button" name="next" class="next btn-ch" value="Siguiente"  />
        </fieldset>
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Confirmación del Desafío</h2>
                        <h2 class="fs-title-text">Completa los campos</h2>
                    </div>
                </div>
                <div class="container cn-confirm">
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="form-group {{ $errors->has('name') ? ' has-error ' : '' }} nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control input-name-ch', 'placeholder' => 'Nombre del Desafío', 'required')) !!}
                                </div>
                                @if ($errors->has('name'))
                                <span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span> @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('number_questions') ? ' has-error ' : '' }} nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    {!! Form::number('number_questions', NULL, array('id' => 'number_questions', 'class' => 'form-control input-c-questions', 'placeholder' => 'C/Preguntas', 'min' => "1", 'max'=>"100" , 'required')) !!}
                                </div>
                                @if ($errors->has('number_questions'))
                                <span class="help-block">
										<strong>{{ $errors->first('number_questions') }}</strong>
									</span> @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="form-group {{ $errors->has('end_date') ? ' has-error ' : '' }} nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="text" data-format="yyyy-MM-dd" class="form-control input-confirm datetimepicker-input" name="end_date" placeholder="El Desafío termina"  data-target="#datetimepicker" required/>
                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('end_date'))
                                <span class="help-block">
									<strong>La fecha debe ser mayor o igual al dia actual</strong>
								</span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('state_id') ? ' has-error ' : '' }} nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <select class="form-control input-confirm" name="state_id" id="state_id" required>
                                        <option value="">Seleccione estado</option>
                                        @if ($states) @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endforeach @endif
                                    </select>
                                </div>
                            </div>
                            @if ($errors->has('state_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('state_id') }}</strong>
                            </span> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous btn-ch" value="Atras" />
            <button type="submit" class="btn-ch">Confirmar!</button>
        </fieldset>
    </div>
</form>
@endsection

@section('footer_scripts')

    @include('scripts.challenge')

@endsection