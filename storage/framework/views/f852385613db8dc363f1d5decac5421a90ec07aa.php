<!--This allows the view o take the layout the home view has in order to use it.-->

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Actualizar Marca
                <div class="pull-right">
                  <a href="<?php echo e(route('lineas_marcas')); ?>" class="btn button-card" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Marcas
                  </a>
                </div>

              </div>

              <div class="card-body">
                <?php echo Form::model($brand,['route' => ['update_brand', $brand->id], 'method' => 'put']); ?>

                <?php echo csrf_field(); ?>

                      <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?> nav-font">
                      <?php echo Form::label('name', 'Marca', array('class' => 'col-md-3 control-label'));; ?>

                      <div class="col-md-9">
                          <div class="input-group">
                              <?php echo Form::text('name', $brand->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre de Marca...')); ?>

                              <div class="input-group-append">
                                  <label for="name" class="input-group-text">
                                      <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          <?php if($errors->has('name')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('name')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                    </div>

                    <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?> nav-font">
                      <?php echo Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label'));; ?>

                      <div class="col-md-9">
                          <div class="input-group">
                              <?php echo Form::text('description', $brand->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción')); ?>

                              <div class="input-group-append">
                                  <label for="description" class="input-group-text">
                                      <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          <?php if($errors->has('description')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('description')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                    </div>
                    
                    <div class="form-group has-feedback row <?php echo e($errors->has('question[]') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('question[]', 'Preguntas', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control js-example-basic-multiple" name="question[]" id="question"  multiple="multiple" >
                                    <option value="">Seleccione Preguntas</option>
                                    <?php if($brand->questions): ?>
                                         <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($question->id); ?>"><?php echo e($question->question_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?> 
                                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($question->id); ?>"><?php echo e($question->question_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    <?php endif; ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="question[]">
                                        <i class="<?php echo e(trans('forms.create_user_icon_role')); ?> nav-font" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <?php if($errors->has('question[]')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('question[]')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                      Actualizar Marca
                    </button>  
                    <?php echo Form::close(); ?>

                </div>
          </div>
      </div>
  </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
$('.js-example-basic-single').select2();
});
<?php if($questionbrand): ?>
        <?php $__currentLoopData = $questionbrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $question2[] = $question ;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        var arrayJSs=<?php echo json_encode($question2);?>;
        console.log(arrayJSs)
        
            $('#question').val(arrayJSs).trigger('select2:clearing');
    <?php endif; ?>    
$(document).ready(function() {
    <?php $question2 = array(); ?>
    $('.js-example-basic-multiple').select2();
    <?php if($brand->questions): ?>
        <?php $__currentLoopData = $brand->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $question2[] = $question->id ;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        var arrayJS=<?php echo json_encode($question2);?>;
        console.log(arrayJS)
        
            $('#question').val(arrayJS).trigger('change.select2');
    <?php endif; ?>

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/linebrand/edit-brand.blade.php ENDPATH**/ ?>