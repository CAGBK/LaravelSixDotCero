<?php $__env->startSection('template_title'); ?>
    Editar Linea
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-login">
              <div class="card-header header-card  text-white">
                Actualizar Linea
                <div class="pull-right">
                  <a href="<?php echo e(route('lineas_marcas')); ?>" class="btn button-card" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                      Voler a la Lista de Lineas
                  </a>
                </div>

              </div>

              <div class="card-body">
                <?php echo Form::model($category,['route' => ['update_line', $category->id], 'method' => 'put']); ?>

                      <?php echo csrf_field(); ?>

                    <div class="form-group has-feedback row <?php echo e($errors->has('line') ? ' has-error ' : ''); ?> nav-font">
                      <?php echo Form::label('line', 'Linea', array('class' => 'col-md-3 control-label'));; ?>

                      <div class="col-md-9">
                          <div class="input-group">
                              <?php echo Form::text('line', $category->name, array('id' => 'line', 'class' => 'form-control', 'placeholder' => 'Nombre de Linea...')); ?>

                              <div class="input-group-append">
                                  <label for="line" class="input-group-text">
                                      <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                  </label>
                              </div>
                          </div>
                          <?php if($errors->has('line')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('line')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback row <?php echo e($errors->has('description') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('description', 'Descripción', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <?php echo Form::text('description', $category->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Descripción de Linea...')); ?>

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
                                    <option value="0" disabled="disbled">Seleccione una Marca</option>
                                    <?php if($category->subcategory): ?>
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php else: ?> 
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
                    <div class="form-group has-feedback row <?php echo e($errors->has('users') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('users', 'Usuarios', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control js-user" name="users[]" id="users"  multiple="multiple" >
                                    <option value="0" disabled="disabled">Seleccione Usuarios</option>
                                    <?php if($category->user): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php else: ?> 
                                       <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    <?php endif; ?>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="users">
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
                    <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                      Actualizar Linea
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
    $('.js-user').select2();
    <?php if($category->user): ?>
        
        var arrayJS=<?php echo $category->user;?>;
        
        $('#users').val(arrayJS).trigger('change.select2');
    <?php endif; ?>
});
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    <?php if($category->subcategory): ?>

        var arrayJS=<?php echo $category->subcategory;?>;
        
        $('#subcategories').val(arrayJS).trigger('change.select2');
    <?php endif; ?>

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/linebrand/edit.blade.php ENDPATH**/ ?>