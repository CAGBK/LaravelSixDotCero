<!--This allows the view o take the layout the home view has in order to use it.-->

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Crear Marca
                <div class="pull-right">
                  <a href="<?php echo e(route('lineas_marcas')); ?>" class="btn button-card" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Marcas
                  </a>
                </div>

              </div>

              <div class="card-body">
                  <form action="<?php echo e(route('ruta_new_brand')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>

                      <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?> nav-font">
                      <?php echo Form::label('name', 'Marca', array('class' => 'col-md-3 control-label'));; ?>

                      <div class="col-md-9">
                          <div class="input-group">
                              <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre de Marca...')); ?>

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
                              <?php echo Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción')); ?>

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
                                    
                                    <?php if($questions): ?>
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
                      Crear Nueva Marca
                    </button>  
                  </form>
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

$(document).ready(function() {
$('.js-example-basic-multiple').select2();
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aaa\Desktop\LaravelSixDotCero\resources\views/linebrand/newbrand.blade.php ENDPATH**/ ?>