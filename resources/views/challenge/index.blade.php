@extends('layouts.app')

@section('template_title')
  Crear Desafio
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-login">
            	<div class="card-header header-card  text-white">
	                Creación de Desafios
	                <div class="pull-right">
	                  <a href="{{ route('lineas_marcas') }}" class="btn button-card" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
	                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
	                      Voler a la Lista de Desafios
	                  </a>
	                </div>
              	</div>
              	<div class="card-body">
              		<form action="{{ route('ruta_new_line') }}" method="POST" id="msform">
                    <!-- progressbar -->
	                    <ul id="progressbar">
	                        <li class="active" id="account"><strong>Participantes</strong></li>
	                        <li id="personal"><strong>Lineas</strong></li>
	                        <li id="payment"><strong>Marcas</strong></li>
	                        <li id="confirm"><strong>Save</strong></li>
	                    </ul>
	                    <div class="progress">
	                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	                    </div> <br> <!-- fieldsets -->
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Selecciona participantes a los que desea invitar</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 1 - 3</h2>
	                                </div>
	                            </div> 
	                            <label class="fieldlabels">Email: *</label> 
	                            <input type="email" name="email" placeholder="Email Id" /> 
	                            <label class="fieldlabels">Username: *</label> 
	                            <input type="text" name="uname" placeholder="UserName" /> 
	                            <label class="fieldlabels">Password: *</label> 
	                            <input type="password" name="pwd" placeholder="Password" /> 
	                            <label class="fieldlabels">Confirm Password: *</label> 
	                            <input type="password" name="cpwd" placeholder="Confirm Password" />
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccione las lineas:</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 2 - 3</h2>
	                                </div>
	                            </div> 
	                            <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> 
	                            <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> 
	                            <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> 
	                            <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
	                        </div> <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccione marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 3 - 3</h2>
	                                </div>
	                            </div> 
	                            <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> 
	                            <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccione marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 3 - 4</h2>
	                                </div>
	                            </div> 
	                            <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> 
	                            <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
	                        </div> 
	                          <button type="submit" class="btn next action-button">Confirmar!</button> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                </form>
              	</div>
            </div>
        </div>
    </div>
</div>

@include('modals.modal-delete')

@endsection

@section('footer_scripts')

    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')
    @include('scripts.challenge')

@endsection