@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection


@section('content')
<div style="background-color:#272727" class="md-12">
  <h1 style="color:#2cab66; margin: -24px 0px -15px 45px;" class="font-weight-bold">{{$challenge->name}}</h1>
  <br>
  @foreach ($points as $point)
    <h1 style="color:#2cab66; margin: 0px 0px 0px 45px;" class="font-weight-bold text-white">Puntos: {{$point->score}}</h1>
  @endforeach
  <br>
</div>
<section class="cotainer">
  
  <div class="container-fluid">
    <div class="row">
        <div id="canvasContainer" class="container-canvas" onclick="miRuleta.startAnimation()">
          <canvas id='Ruleta' width='700' height='690' data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
            Canvas not supported, use another browser.
          </canvas> 
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('footer_scripts')

    @include('scripts.Winwheel')
    @include('scripts.ruleta')

@endsection
