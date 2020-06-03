@extends('layouts.app')
@section('content')
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-lchallenge">
            <h2 class="text ch-text fs-title-list">Desafíos</h2>
            <h3 class="text ch-text-two text-white">Te han Desafiado:</h3>
            <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
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
            @foreach ($challenges as $challenge)
                @if($challenge->users)
                <?php 
                $arrayUsers = json_decode($challenge->users);
                $participants = count($arrayUsers);
                ?>
                @foreach ($arrayUsers as $user)
                    @if ($user == Auth()->user()->id)
                        <div class="" data-toggle="modal" data-target="#challengeModal{{ $challenge->id }}">
                            <div class="card-challenge-list" style="background-color: @foreach ($challenge->challengeus as $element)@if ($element->user_id == Auth()->user()->id){{ $element->state->color }}@endif @endforeach">
                                <div class="col-sm-7">
                                    <label  class="lb-list-challenge" for="xx"><i class="fa fa-trophy text-white ctrophy" aria-hidden="true"></i>Puesto 0/{{ $participants }}</label>
                                    <hr class="text-white hr-challenge" >
                                    <label class="lb-list-challenge text-center font-weight-bold" for="xx">{{$challenge->name}}</label>
                                    <img src="/images/hospital.png" class="list-img-challenge" alt="">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            @endforeach
        </div>
        <div style="margin-top: 2rem;">
            <h3><strong>Desafios creados por usted pero no participa</strong></h3>
            <hr class="line-style" >
        </div>
        <div class="row">
            @foreach ($challenges as $challenge)
            <?php
                $arrayUser = Auth()->user()->id;
                $arrayUsers = json_decode($challenge->users);
                $participants = count($arrayUsers);
                $inGame = in_array($arrayUser, $arrayUsers);
            ?>
            @if ($inGame == false)
            @if ($challenge->user_id == Auth()->user()->id)
            <div class="" data-toggle="modal" data-target="#challengeModal{{ $challenge->id }}">
                <div class="card-challenge-list" style="background-color:{{ $challenge->state->color }}">
                    <div class="col-sm-7">
                    <label  class="lb-list-challenge" for="xx"><i class="fa fa-trophy text-white ctrophy" aria-hidden="true"></i>Jugadores/{{ $participants }}</label>
                        <hr class="text-white hr-challenge" >
                        <label class="lb-list-challenge text-center font-weight-bold" for="xx">{{$challenge->name}}</label>
                        <img src="/images/hospital.png" class="list-img-challenge" alt="">
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
    @include('modals.modal-challenge')
@endsection