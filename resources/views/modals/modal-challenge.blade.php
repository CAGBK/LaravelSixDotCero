<?php foreach ($challenges as $challenge): ?>
  <div class="modal fade bd-example-modal-lg" id="challengeModal{{ $challenge->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelChallenge" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header header-card">
        <h5 class="modal-title text-white text-center" id="ModalLabelChallenge">{{ $challenge->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Usuarios:
              </strong>
            </div>
            <div class="col-sm-7">
              <?php 
              $arrayUsers = json_decode($challenge->users);
              ?>
              @foreach ($arrayUsers as $value)
                @foreach ($users as $user)
                  <span class="badge badge-info">{{ $value == $user->id ? $user->name : ''  }}</span>
                @endforeach
              @endforeach 
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Marcas:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php 
              $arraySubcategories = json_decode($challenge->subcategories);
              ?>
              @foreach ($arraySubcategories as $value)
                @foreach ($subcategories as $subcategory)
                  <span class="badge badge-info">{{ $value == $subcategory->id ? $subcategory->name : ''  }}</span>
                @endforeach
              @endforeach 

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Estado:
              </strong>
            </div>

            <div class="col-sm-7">
              
              {{ $challenge->state->state }}
              
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Fecha desafio:
              </strong>
            </div>

            <div class="col-sm-7">
              <span><strong>Fecha Inicio: </strong></span>{{ $challenge->start_date }} <span><strong>Fecha Fin: </strong></span>{{ $challenge->end_date }} 
            </div>
          </div>
      </div>
      <div class="modal-footer">
        @foreach ($challenge->challengeus as $element)
          @if ($element->user_id == Auth()->user()->id)
            @if ($element->state_id == 3)
              <a href="{{ route('game',['id' => $challenge->id]) }}" type="button" class="btn btn-primary">Continuar Desafío</a>
            @elseif ($element->state_id == 1)
              <a href="{{ route('game',['id' => $challenge->id]) }}" type="button" class="btn btn-primary">Jugar</a>
              @if($challenge->user_id == Auth()->user()->id)
                <a href="{{ route('edit_challenge',['id' => $challenge->id]) }}" type="button" class="btn btn-success">Editar Desafío</a>
              @endif
            @endif
          @endif
        @endforeach
        <a href="{{ route('game',['id' => $challenge->id]) }}" type="button" class="btn btn-primary">Ver detalle</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="challengenModal{{ $challenge->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelChallengen" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header header-card">
        <h5 class="modal-title text-white text-center" id="ModalLabelChallengen">{{ $challenge->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Usuarios:
              </strong>
            </div>
            <div class="col-sm-7">
              <?php 
              $arrayUsers = json_decode($challenge->users);
              ?>
              @foreach ($arrayUsers as $value)
                @foreach ($users as $user)
                  <span class="badge badge-info">{{ $value == $user->id ? $user->name : ''  }}</span>
                @endforeach
              @endforeach 
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Marcas:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php 
              $arraySubcategories = json_decode($challenge->subcategories);
              ?>
              @foreach ($arraySubcategories as $value)
                @foreach ($subcategories as $subcategory)
                  <span class="badge badge-info">{{ $value == $subcategory->id ? $subcategory->name : ''  }}</span>
                @endforeach
              @endforeach 

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Estado:
              </strong>
            </div>

            <div class="col-sm-7">
              
              {{ $challenge->state->state }}
              
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Fecha desafio:
              </strong>
            </div>

            <div class="col-sm-7">
              <span><strong>Fecha Inicio: </strong></span>{{ $challenge->start_date }} <span><strong>Fecha Fin: </strong></span>{{ $challenge->end_date }} 
            </div>
          </div>
      </div>
      <div class="modal-footer">
        @if($challenge->state_id = 1)
          <a href="{{ route('edit_challenge',['id' => $challenge->id]) }}" type="button" class="btn btn-success">Editar Desafío</a>
        @endif
        <a href="{{ route('report_challenge',['id' => $challenge->id]) }}" type="button" class="btn btn-primary">Ver detalle</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>