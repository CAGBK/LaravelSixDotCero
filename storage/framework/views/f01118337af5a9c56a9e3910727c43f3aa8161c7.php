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
	                            <div class="form-group has-feedback row <?php echo e($errors->has('user_id') ? ' has-error ' : ''); ?> nav-font">
			                        <div class="col-md-12">
										<table id="users-check" class="table ">
											<thead>
												<tr>
													<th>
														a
													</th>
												</tr>
											</thead>
											<?php if($users): ?>
												<tbody>
													<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td>
																<input id="<?php echo e($user->id); ?>" name="check-user" type="checkbox" value="<?php echo e($user->id); ?>" >
																<?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1 ): ?>
																<img name="img-user" src="<?php echo e($user->profile->avatar); ?>" alt="<?php echo e($user->name); ?>" class="user-avatar-nav user-challenge">
																<?php else: ?>
																<img class="user-avatar-nav user-challenge">
																<?php endif; ?>
																<label name="name-user" class="label-challenge" for=""><?php echo e($user->name); ?> </label>		
															</td>
														</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
													<?php endif; ?>
			                                    </label>
											</table>
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
	                                    <h2 class="fs-title">Seleccióne Marcas</h2>
	                                </div>
	                                <div class="col-5">
	                                    <h2 class="steps">Paso 2 - 3</h2>
	                                </div>
	                            </div> 
	                            <div class="form-group has-feedback row <?php echo e($errors->has('brand_id') ? ' has-error ' : ''); ?> nav-font">
			                        <div class="col-md-12">
										<table id="brands-checkgit " class="table ">
											<thead>
												<tr>
													<th>
														a
													</th>
												</tr>
											</thead>
											<?php if($subcategories): ?>
												<tbody>
													<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td>
																<input id="<?php echo e($subcategory->id); ?>" name="check-subcategory" type="checkbox" value="<?php echo e($subcategory->id); ?>" >
																<?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1 ): ?>
																<img name="img-subcategory" src="<?php echo e($subcategory->profile->avatar); ?>" alt="<?php echo e($subcategory->name); ?>" class="subcategory-avatar-nav subcategory-challenge">
																<?php else: ?>
																<img class="subcategory-avatar-nav subcategory-challenge">
																<?php endif; ?>
																<label name="name-subcategory" class="label-challenge" for=""><?php echo e($subcategory->name); ?> </label>		
															</td>
														</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
													<?php endif; ?>
			                                    </label>
											</table>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
 
<script type="application/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
	$(document).ready(function() {
				$('.select-user').select2();	
			$('.select-brand').select2();	
			$('.select-line').select2();	
		});	
	
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/challenge/index.blade.php ENDPATH**/ ?>