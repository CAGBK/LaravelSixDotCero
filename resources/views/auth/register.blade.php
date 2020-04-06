@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-login background-login">
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <button type="button" data-toggle="modal" data-target="#confirmSelectImg" data-title="Cambiar imagen" class="btn btn-camera-register" style="width: 10%;"><i aria-hidden="true" class="fas fa fa-camera"></i> <span class="hidden-xs hidden-sm"></button>
                                <img id="data-img" name="image_progile" src="/images/Perfil.png" class="user-avatar-register">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="name" type="text" class="lb-register form-control col-md-7{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="XXXXX"required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="first_name" type="text" class="lb-register form-control col-md-7{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="XXXXX"required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="last_name" type="text" class="lb-register form-control col-md-7{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="XXXXX"required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="email" type="email" class="lb-register form-control col-md-7{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="XXXXX"required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="password" type="password" class="lb-register form-control col-md-7{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="XXXXX"required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="password-confirm" type="password" class="lb-register form-control col-md-7" name="password_confirmation" placeholder="XXXXX"required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-4 content-align offset-md-4">
                                <button type="submit" class="btn-login">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: -webkit-center;">
                            <a class="btn btn-link login-nav">
                                Tienes una cuenta? <a class="btn btn-link login-nav custom-link" href="{{ route('login') }}">
                                    {{ __('Ingresar') }} </a>
                                </div>
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.modal-img')
@include('scripts.user-avatar-dz')
@endsection

