<!--This allows the view o take the layout the home view has in order to use it.-->
@extends('home')
@section('contentHome')
<div class="row col-sm-12 col-md-12 col-lg-12 justify-content-center font">
  <section class="col-12 col-sm-12 col-md-9 col-lg-4 space space-content-list form-group">
    <section class="col-md-12 col-lg-12">
      <div class=" col-md-12 form-group text-center">
        <h2 class="p-2">Actualizar rol del sistema </h2>
        <hr>
      </div>
      <div class=" col-md-12 form-group">
        <!--This is the vue component to edit or update the role.-->
        <list-permission :edition=true></list-permission>
      </div>
    </section>
  </section>
</div>
@endsection
