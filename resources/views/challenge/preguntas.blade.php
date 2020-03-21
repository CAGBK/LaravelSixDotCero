@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection

@section('content')
<section class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
        <div class="card-header text-white text-center" style="background-color: red">
          <span style="font-size: 40px">¿Cuál es la dosís recomendada para Adorlan?</span>
        </div>
        <div class="card-body">
          <div style="border-radius: 1rem;border: 1px red solid;opacity: .5; margin: 5px" class="col-md-12 text-center">
            <p class="pregunta-text"><strong>a)</strong> Hola</p>
          </div>
          <div style="border-radius: 1rem;border: 1px red solid;opacity: .5; margin: 5px" class="col-md-12 text-center">
            <p class="pregunta-text"><strong>b)</strong> Hola</p>
          </div>
        
          <div style="border-radius: 1rem;border: 1px red solid;opacity: .5; margin: 5px" class="col-md-12 text-center">
            <p class="pregunta-text"><strong>c)</strong> Hola</p>
          </div>
          <div style="border-radius: 1rem;border: 1px red solid;opacity: .5; margin: 5px" class="col-md-12 text-center">
            <p class="pregunta-text"><strong>d)</strong> Hola</p>
          </div>
        </div>                        
      </div>
    </div>
  </div>
</section>
@endsection