@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection

@section('content')
<section class="container">
  <div class="banner-challenge ">
    
</div>
  <div class="row">
    <div class="col-sm-12">
      @foreach ($question as $questiona)
      <h3 class="text-white">Pregunta</h3>
      <div class="text-white text-center" style="background-color: {{$questiona->cquestion->color}}">
        <span style="font-size: 40px">{{$questiona->question_name}}</span>
      </div>
        <div class="card-question">
        <div class="card-body">
          @foreach ($questiona->answers as $answer)
          <div style="border-radius: 1rem;border: 1px {{$questiona->cquestion->color}} solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="{{ URL::to('answer/' . $answer->id . '/' . $challenge->id) }}" style="text-decoration:none;color:#000;">
            <p class="pregunta-text">{{$answer->name}}</p>
          </a></div>
          @endforeach
        </div>
        @endforeach                        
      </div>
    </div>
  </div>
</section>
@endsection