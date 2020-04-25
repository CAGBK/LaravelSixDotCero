@extends('layouts.challenge')

@section('template_title')
  Jugar Desafío
@endsection
@section('content')
<div class="nav-ruleta"  class="md-12">
  <h2 style="color:#2cab66; margin: -24px 0px -15px 45px;" class="font-weight-bold">{{$challenge->name}}</h2>
  <br>
  @foreach ($points as $point)
    <h2 style="color:#2cab66; margin: 0px 0px 0px 45px;" class="font-weight-bold text-white">Puntos: {{$point->score}}</h2>
  @endforeach
  <br>
</div>
<section class="cotainer">
  @if (session()->has('correcto'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Bien!</strong> {{ session('correcto') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  @if (session()->has('fallo'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{ session('fallo') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="container-fluid">
    <div class="row">
      <div id="canvasContainer" class="container-canvas" onclick="miRuleta.startAnimation()">
        <canvas id='Ruleta' width='700' height='690' data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
            Canvas not supported, use another browser.
        </canvas> 
      </div>
    </div>
  </div>
</section>

@endsection
@section('footer_scripts')

    @include('scripts.Winwheel')
    @include('scripts.ruleta')

@endsection
