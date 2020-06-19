@extends('layouts.app')
@section('template_title')
    Desafíos
@endsection
@section('content')
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-report-challenge">
            <h2 class="text ch-text fs-title-list">Reporte de Desafio</h2>
            <h3 class="text ch-text-two text-white">{{$challenge->name}}</h3>
        </div>
    </div> 
</div>
@if (session()->has('fallo'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Advertencia!</strong> {{ session('fallo') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif 
<div class="container">
        <div class="row " style="margin-top: 2rem;">
            
           
        </div>
        
        <div style="margin-top: 2rem;">
            <hr class="line-style" >
        </div>
        <div class="form-group has-feedback row {{ $errors->has('check_user') ? ' has-error ' : '' }} ">
                    <div class="col-md-12">
                        <table id="challenge-check" class="table">
                            <thead style="display:none;">
                                <tr>
                                    <th class="sorting_asc">
                                        Usuarios
                                    </th>
                                    
                                </tr>
                            </thead>
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
@endsection