@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-login background-login">
                <div class="header-login login-nav col-md-12">{{ __('Hola!') }}
                </div>
                <label class="col-md-6 text-login col-form-label text-md-right nav-font">{{ __('registrate con un correo electrónico y contraseña para la aplicación') }}</label>
                
                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12 content-align">
                                <input id="email" type="email" class="col-md-7 form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-login" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electrónico">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                           

                            <div class="col-md-12 content-align">
                                <input id="password" type="password" class="col-md-7 form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-login" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 " style="text-align: -webkit-center;">
                                <button type="submit" class="btn-login">
                                    {{ __('Ingresar') }}
                                </button>

                            </div>
                            <div class="col-md-12" style="text-align: -webkit-center;">
                            <a class="btn btn-link login-nav">
                                Tienes una cuenta? <a class="btn btn-link login-nav custom-link" href="{{ route('register') }}">
                                    {{ __('Registrarse') }} </a>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection