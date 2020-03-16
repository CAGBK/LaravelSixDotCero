@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection


@section('content')

<section class="cotainer">
  <div class="container-fluid">
    <div class="row">
        <div id="canvasContainer" class="container-canvas" onclick="miRuleta.startAnimation()">
          <canvas id='Ruleta' width='700' height='690'>
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
