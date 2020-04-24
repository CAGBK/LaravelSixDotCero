@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection

@section('content')
<section class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
      @if ($question)
      <div class="card-header text-white text-center" style="background-color: {{$question->cquestion->color}}">
          <span style="font-size: 40px">{{$question->question_name}}</span>
        </div>
        <div class="card-body">
          @foreach ($question->answers as $answer)
          <div style="border-radius: 1rem;border: 1px {{$question->cquestion->color}} solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="{{ URL::to('answer/' . $answer->id . '/' . $challenge->id) }}" style="text-decoration:none;color:#000;">
            <p class="pregunta-text">{{$answer->name}}</p>
          </a></div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection