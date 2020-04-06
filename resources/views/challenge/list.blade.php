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
        <div class="row">
            @foreach ($challenges as $challenge)
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box" style="background-color: {{ $challenge->state->color }}">
                        <div class="inner">
                            <h3 class="text-center"> 1/5</h3>
                            <p>
                                {{ $challenge->name }}
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gamepad" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal{{ $challenge->id }}">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('modals.modal-challenge')
@endsection