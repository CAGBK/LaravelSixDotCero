<!--This allows the view o take the layout the home view has in order to use it.-->

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Linea</div>

              <div class="card-body">
                  <form action="<?php echo e(route('ruta_new_line')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>

                      <div class="form-group has-feedback row <?php echo e($errors->has('brand') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('brand', 'Linea', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <?php echo Form::text('brand', NULL, array('id' => 'brand', 'class' => 'form-control', 'placeholder' => 'Nombre de Linea...')); ?>

                                <div class="input-group-append">
                                    <label for="brand" class="input-group-text">
                                        <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <?php if($errors->has('brand')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('brand')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <?php echo Form::text('description', NULL, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción de Linea...')); ?>

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
                    <div class="form-group has-feedback row <?php echo e($errors->has('state_id') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('state_id', 'Marca', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control js-example-basic-multiple" name="subcategories[]" id="subcategories"  multiple="multiple" >
                                    <option value="">Seleccione una Marca</option>
                                    
                                    <?php if($subcategories): ?>
                                    
                                    
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="state_id">
                                        <i class="<?php echo e(trans('forms.create_user_icon_role')); ?> nav-font" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <?php if($errors->has('role')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Guardar
                              </button>
                          </div>
                      </div>
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

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/linebrand/new.blade.php ENDPATH**/ ?>