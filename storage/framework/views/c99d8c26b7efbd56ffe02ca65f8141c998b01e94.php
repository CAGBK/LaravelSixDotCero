<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-login">
            	<div class="card-header header-card  text-white">
	                Creación de Desafios
	                <div class="pull-right">
	                  <a href="<?php echo e(route('lineas_marcas')); ?>" class="btn button-card" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
	                      <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
	                      Voler a la Lista de Desafios
	                  </a>
	                </div>
              	</div>
              	<div class="card-body">
              		<form action="<?php echo e(route('ruta_new_line')); ?>" method="POST" id="msform">
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
	                                    <h2 class="steps">Paso 1 - 4</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row <?php echo e($errors->has('user_id') ? ' has-error ' : ''); ?> nav-font">
			                        <div class="col-md-12">
			                            <div class="input-group">
			                                <select class="custom-select form-control select-user"  name="users[]" id="users"  multiple="multiple" >
			                                    <option value="" disabled="disabled">Seleccione una Usuarios</option>
			                                    
			                                    <?php if($users): ?>
			                                    
			                    
			                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
			                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                                    <?php endif; ?>
			                                </select>
			                                <div class="input-group-append">
			                                    <label class="input-group-text" for="user_id">
			                                        <i class="fa fa-fw fa-user-plus nav-font" aria-hidden="true"></i>
			                                    </label>
			                                </div>
			                            </div>
			                            <?php if($errors->has('user_id')): ?>
			                                <span class="help-block">
			                                    <strong><?php echo e($errors->first('user_id')); ?></strong>
			                                </span>
			                            <?php endif; ?>
			                        </div>
			                    </div>
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" />
	                    </fieldset>
	                   <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Selecciona Lineas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 2 - 4</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row <?php echo e($errors->has('line_id') ? ' has-error ' : ''); ?> nav-font">
			                        <div class="col-md-12">
			                            <div class="input-group">
			                                <select class="custom-select form-control select-line" name="lines[]" id="lines"  multiple="multiple" >
			                                    
			                                    <?php if($categories): ?>
			                                    
			                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
			                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                                    <?php endif; ?>
			                                </select>
			                                <div class="input-group-append">
			                                    <label class="input-group-text" for="line_id">
			                                        <i class="fa fa-fw fa-user-plus nav-font" aria-hidden="true"></i>
			                                    </label>
			                                </div>
			                            </div>
			                            <?php if($errors->has('line_id')): ?>
			                                <span class="help-block">
			                                    <strong><?php echo e($errors->first('line_id')); ?></strong>
			                                </span>
			                            <?php endif; ?>
			                        </div>
			                    </div>
	                        </div> 
	                        <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atras" />
	                    </fieldset>
	                    <fieldset>
	                        <div class="form-card">
	                            <div class="row">
	                                <div class="col-7">
	                                    <h2 class="fs-title">Seleccióne Marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 3 - 4</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row <?php echo e($errors->has('brand_id') ? ' has-error ' : ''); ?> nav-font">
			                        <div class="col-md-12">
			                            <div class="input-group">
			                                <select class="custom-select form-control select-brand" name="brands[]" id="brands"  multiple="multiple" >
			                                    <option value="">Seleccione marcas</option>
			                                </select>
			                                <div class="input-group-append">
			                                    <label class="input-group-text" for="brand_id">
			                                        <i class="fa fa-fw fa-user-plus nav-font" aria-hidden="true"></i>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
		$(document).ready(function() {
		var lines = $(".select-line");
		var brands = $(".select-brand");
			$.ajax({
				type: 'GET',
				url: '/brandByLinea/' + lines
			}).then(function (data) {
				
				// create the option and append to Select2
				var option = new Option(data.name, data.id, true, true);
				console.log(option, "hola");
				lines.append(option).trigger('change');

				// manually trigger the `select2:select` event
				lines.trigger({
					type: 'select2:select',
					params: {
						data: data
					}
				});
			});
			
			$('.select-user').select2();
			$('.select-brand').select2();
			$('.select-line').select2();
		});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/index.blade.php ENDPATH**/ ?>