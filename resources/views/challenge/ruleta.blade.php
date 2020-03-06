@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection


@section('content')

<section class="cotainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 text-center"> 
        <div class="card bg-warning">
          <div class="card-body">
            <h4 class="card-title">Lista de elementos:</h4>  
            <textarea id="ListaElementos" class="form-control" rows="13">
              Equipo 1
              Equipo 2
              Equipo 3
              Equipo 4
              Equipo 5
              Equipo 6
              Equipo 7
              Equipo 10
            </textarea>
            <br />
          </div>
        </div>
      </div>
      <div class="col-7 text-center">
        <br/>
        <div id="canvasContainer" onclick="miRuleta.startAnimation()">
          <canvas id='Ruleta' width='700' height='690'>
            Canvas not supported, use another browser.
          </canvas> 
        </div>
      </div>
      <div class="col-2">
        <br/>
      </div>
    </div>
  </div>
</section>



@endsection

@section('footer_scripts')

    @include('scripts.Winwheel')
    @include('scripts.ruleta')

@endsection
