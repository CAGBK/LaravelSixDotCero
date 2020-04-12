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
</div> 
<div class="container">
        <div style="margin-top: 2rem;">
            <h2><strong>Desafios creados por usted pero no participa</strong></h2>
        </div>
        <div class="row">
            @foreach ($challenges as $challenge)
            <?php
                $arrayUser = Auth()->user()->id;
                $arrayUsers = json_decode($challenge->users);
                $inGame = in_array($arrayUser, $arrayUsers);
            ?>
            @if ($inGame === false)
            @if ($challenge->user_id === Auth()->user()->id)
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box" style="background-color: {{ $challenge->state->color }} ">
                        <div class="inner">
                            <p>
                                <strong>
                                    {{ $challenge->name }}
                                </strong>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gamepad" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal{{ $challenge->id }}">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            @endif
            @endforeach
        </div>
        <div style="margin-top: 2rem;">
            <h2><strong>Desafios en los que participa</strong></h2>
        </div>
        <div class="row">
            @foreach ($challenges as $challenge)
                @if($challenge->users)
                <?php 
                $arrayUsers = json_decode($challenge->users);
                ?>
                @foreach ($arrayUsers as $user)
                    @if ($user == Auth()->user()->id)
                        <div class="col-lg-3 col-sm-6">
                            <div class="card-box" style="background-color: @foreach ($challenge->challengeus as $element)@if ($element->user_id == Auth()->user()->id){{ $element->state->color }}@endif @endforeach">
                                <div class="inner">
                                    <p>
                                        <strong>
                                            {{ $challenge->name }}
                                        </strong>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                                </div>
                                <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal{{ $challenge->id }}">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            @endforeach
        </div>
    </div>
    @include('modals.modal-challenge')
@endsection