<?php $__env->startSection('template_title'); ?>
    Editar Marca
<?php $__env->stopSection(); ?>
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
                              <?php echo Form::text('name', $brand->name, array('id' => 'name', 'class' => 'form-control general-input', 'placeholder' => 'Nombre de Marca...')); ?>

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
                              <?php echo Form::text('description', $brand->description, array('id' => 'description', 'class' => 'form-control general-input', 'placeholder' => 'Descripción')); ?>

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
                                    <option value="0">Seleccione Preguntas</option>
                                    <?php if($brand->question): ?>
                                         <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($question->id); ?>"><?php echo e($question->question_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?> 
                                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($question->id); ?>"><?php echo e($question->question_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?php if($errors->has('question[]')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('question[]')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback row <?php echo e($errors->has('image_brand[]') ? ' has-error ' : ''); ?> nav-font">
                        <?php echo Form::label('image_brand[]', 'Imagen de Marca', array('class' => 'col-md-3 control-label'));; ?>

                        <div class="col-md-9">
                            <div class="input-group">
                                <label class="lb-img radio-b"  style="background-color: #6cbbcb;">
                                    <img class="brand-img" src="/images/hospital.png" />
                                    
                                    <input type="radio" name="image" value="/images/hospital.png|#6cbbcb" <?php echo e($brand->subcategory_image == "/images/hospital.png" ? 'checked="checked"' : ''); ?>/>
                                </label>
                                <label class="lb-img radio-b"  style="background-color:#8db81b ;">
                                    <img class="brand-img" src="/images/medicine.png" />
                                    <input type="radio" name="image" value="/images/medicine.png|#8db81b"  <?php echo e($brand->subcategory_image == "/images/medicine.png" ? 'checked="checked"' : ''); ?>/>
                                </label>
                                <label class="lb-img radio-b"  style="background-color: #f51d3f;">
                                    <img class="brand-img" src="/images/tablet.png" />
                                    <input type="radio" name="image" value="/images/tablet.png|#8db81b"  <?php echo e($brand->subcategory_image == "/images/tablet.png" ? 'checked="checked"' : ''); ?>/>
                                </label>
                                <label class="lb-img radio-b"  style="background-color:#f7c100;">
                                    <img class="brand-img" src="/images/drug.png" />
                                    <input type="radio" name="image" value="/images/drug.png|#f7c100" <?php echo e($brand->subcategory_image == "/images/drug.png" ? 'checked="checked"' : ''); ?>/>
                                </label>
                            </div>
                            <?php if($errors->has('image_brand[]')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('image_brand[]')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (Auth::check() && Auth::user()->hasPermission('edit.brand')): ?>
                    <div class="form-group has-feedback row  nav-font">
                        <div class="col-md-12 text-center"> 
                            <button type="submit" class="btn btn-success ">
                            Actualizar Marca
                            </button>
                        </div>
                    </div>  
                    <?php endif; ?>
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
    $('.js-example-basic-multiple').select2();
    <?php if($brand->question): ?>

        var arrayJS=<?php echo $brand->question;?>;
        
        $('#question').val(arrayJS).trigger('change.select2');
    <?php endif; ?>

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\camil\Desktop\LaravelSixDotCero\resources\views/linebrand/edit-brand.blade.php ENDPATH**/ ?>