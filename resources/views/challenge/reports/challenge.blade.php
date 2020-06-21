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
                        <table id="challenge-report" class="table-report">
                            <thead style="display:none;">
                                <tr>
                                    <th class="sorting_asc">
                                        Number
                                    </th>
                                    <th class="sorting_asc">
                                        Image
                                    </th>
                                    <th class="sorting_asc">
                                        Name
                                    </th>
                                    <th class="sorting_asc">
                                        Poin
                                    </th>
                                </tr>
                            </thead>
                            @if ($users)
                            <tbody >
                                @foreach($users as $user)
                                <tr class="tr-challenge-report">
                                    <td class="sorting">
                                        <label name="img-user" class="label-challenge-iteration" for="">{{ $loop->iteration }} </label>
                                    </td>
                                    <td>
                                        <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar-nav user-challenge-report">
                                    </td>
                                    <td class="trophy-report" >
                                        <label name="img-user" class="label-challenge-name" for="">{{ $user->name }} </label>  
                                        @if($loop->first)
                                            <i class="fa fa-trophy insigts-gold" aria-hidden="true"></i>
                                        @endif 
                                        @if($loop->iteration == 2)
                                            <i class="fa fa-trophy insigts-silver" aria-hidden="true"></i>
                                        @endif
                                        @if($loop->iteration == 3)
                                            <i class="fa fa-trophy insigts-bronze" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td class="tr-challenge-points">
                                        <label name="img-user" onmouseover="this.style.color='#93bf1c'"  onmouseout="this.style.color='#272727'"  class="label-challenge-points" for="">{{ $user->score }} Puntos</label>
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
@section('footer_scripts')

    @include('scripts.reports')

@endsection