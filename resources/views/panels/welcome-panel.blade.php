@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp

<div class="card card-login">

    <div class="card-header header-card   text-white">

        Bienvenido {{ Auth::user()->name }}

        @role('admin', true)
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Acceso de Administrador
            </span>
        @else
            <span class="pull-right badge text-white" style="margin-top:4px ; background-color: #ffc107;">
                Acceso de Usuario
            </span>
        @endrole

    </div>
    <div class="card-body">
        <h2 class="lead">
            ¡Estás conectado!
        </h2>

        <hr>

        <p>
            Tienes acceso de
                <strong>
                    @role('admin')
                       Admin
                    @endrole
                    @role('user')
                       User
                    @endrole
                </strong>
        </p>

        <hr>

        <p>
           Tienes acceso a niveles: {{ $levelAmount }}:
            @level(5)
                <span class="badge badge-primary margin-half">5</span>
            @endlevel

            @level(4)
                <span class="badge badge-info margin-half">4</span>
            @endlevel

            @level(3)
                <span class="badge badge-success margin-half">3</span>
            @endlevel

            @level(2)
                <span class="badge badge-warning margin-half">2</span>
            @endlevel

            @level(1)
                <span class="badge badge-default margin-half">1</span>
            @endlevel
        </p>
            <hr>
            <p>
                <center><a href="{{ url('/challenge-list') }}" class="btn text-white" style="background-color: #2cab66;">¡Crea un Desafio!</a></center>
            </p>
    </div>
</div>
