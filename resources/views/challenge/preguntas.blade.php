@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection

@section('content')

<div class="banner-challenge-questions">
  <div class="col-sm-7">
    <?php 
    $arrayUsers = json_decode($challenge->users);
    ?>
      @foreach ($users as $user)
        @foreach ($arrayUsers as $value)
          @if($value == $user->id)
            <!--img src="{{ Gravatar::get($user->email)}}" class="user-avatar-nav user-challenge"-->
            <span class="badge badge-info">{{  $user->name }}</span>
            @endif
        @endforeach
    @endforeach 
  </div>
</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
      @if ($question)
      <div class="card-header text-white text-center" onclick="document.body.style.backgroundColor = 'green';" style="background-color: {{$question->cquestion->color}}">
        <div class="text-left">
          <label class="question-lb" for="">Pregunta</label>
        </div>
        <div>
          <label class="question-label-name">{{$question->question_name}}</label>
        </div>
        </div>
        <div class="card-body">
          @foreach ($question->answers as $answer)
          <div onMouseOver="this.style.color='#0F0'" style="border-radius: 1rem;border: 2px {{$question->cquestion->color}} solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="{{ URL::to('answer/' . $answer->id . '/' . $challenge->id) }}" style="text-decoration:none;color:#000;">
            <p onMouseOver="this.style.color='{{$question->cquestion->color}}'" onMouseOut="this.style.color='#000'" class="answer-text">{{$answer->name}}</p>
          </a></div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>

@endsection