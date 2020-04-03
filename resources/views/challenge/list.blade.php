@extends('layouts.app')
@section('content')
<div class="form-card">
    <div class="row">
            <div class="col-12 nav-lchallenge">
                <h2 class="text ch-text fs-title">Desafíos</h2>
                <h3 class="text ch-text-two text-white">Te han invitado a un desafío :</h3>
                <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
            </div>
        </div> 
        <div class="form-group has-feedback row {{ $errors->has('user_id') ? ' has-error ' : '' }} nav-font">
            <div class="col-md-12">
                <table id="users-check" class="table tfoot td no-footer ">
                    <thead>
                        <tr>
                            <th style="display:none">
                                a
                            </th>
                        </tr>
                    </thead>
                    @if ($users)
                        <tbody>
                            @foreach($users as $user)
                                <tr class="column-list-challenge">
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