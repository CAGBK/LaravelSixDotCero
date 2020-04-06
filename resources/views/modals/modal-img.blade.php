<div class="modal fade" id="confirmSelectImg" role="dialog" aria-labelledby="confirmSelectImgLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Seleccionar imagen de perfil de usuario
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="col-12 col-sm-8 col-md-9">   
                <div class="dz-preview"></div>
                    {!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                    <img id="user_selected_avatar" class="user-avatar" src="" alt="">
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
  