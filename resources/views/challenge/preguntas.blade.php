@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection

@section('content')
<section class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
        @foreach ($question as $questiona)
      <div class="card-header text-white text-center" style="background-color: {{$questiona->cquestion->color}}">
          <span style="font-size: 40px">{{$questiona->question_name}}</span>
        </div>
        <div class="card-body">
          @foreach ($questiona->answers as $answer)
          <div style="border-radius: 1rem;border: 1px {{$questiona->cquestion->color}} solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="{{ URL::to('answer/' . $answer->id ) }}" style="text-decoration:none;color:#000;">
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