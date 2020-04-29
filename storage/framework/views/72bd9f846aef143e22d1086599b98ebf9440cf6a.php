<?php $__env->startSection('template_title'); ?>
  Editar Desafío
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::model($challenge,['route' => ['update_challenge', $challenge->id], 'method' => 'put', 'id' => 'msform' ]); ?>

    <?php echo csrf_field(); ?>
    <!-- progressbar -->
    <div class="banner-challenge ">
        <ul id="progressbar">
            <li class="active" id="account"><strong></strong></li>
            <li id="payment"><strong></strong></li>
            <li id="confirm"><strong></strong></li>
        </ul>
    </div>
    <div class="container">
        <fieldset id="checkArrayUsers">
            <div class="form-card">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fs-title">Crear Desafío</h2>
                        <h2 class="fs-title-text">Selecciona participantes a los que invitar</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $__env->make('partials.form-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback row <?php echo e($errors->has('check_user') ? ' has-error ' : ''); ?> ">
                    <div class="col-md-12">
                        
                        <table id="users-check" class="table">
                            <thead>
                                <tr>
                                    <th class="sorting_asc">
                                        Usuarios
                                    </th>
                                    
                                </tr>
                            </thead>
                            <label class="label-info" for="" >Recuerda que si quieres participar del juego debes seleccionarte</label>
                            <?php if($users): ?>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="tr-challenge">
                                    <td class="sorting">
                                        <label class="checkbox path">
                                            <input id="user-<?php echo e($user->id); ?>"  class="check_users" name="check_user[]"  type="checkbox"  value="<?php echo e($user->id); ?>" <?php echo e(in_array($user->id, $usersChallenge) ? 'checked="checked"' : ''); ?>>
                                            <svg viewBox="0 0 21 21">
                                                <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                            </svg>
                                        </label>
                                        <img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="user-avatar-nav user-challenge">
                                        <label name="img-user" class="label-challenge" for=""><?php echo e($user->name); ?> </label>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <?php endif; ?>
                            </label>
                        </table>
                    </div>
                    <?php if($errors->has('check_user')): ?>
                        <span class="help-block ">
                            <strong ><?php echo e($errors->first('check_user')); ?></strong>
                        </span> 
                    <?php endif; ?>
                </div>
            </div>
            <input id="btn-filter" type="button" name="next" class="next  btn-ch" value="Siguiente"/>
        </fieldset>
        <fieldset id="checkArrayBrands">
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Tipo de Desafío</h2>
                        <h2 class="fs-title-text">Seleccione la marca</h2>
                    </div>
                </div>
                <div class="form-group has-feedback row <?php echo e($errors->has('check_subcategory') ? ' has-error ' : ''); ?> nav-font">
                    <div class="col-md-12">
                        <table id="brands-check" class="table">
                            <thead>
                                <tr>
                                    <th style="display:none;">

                                    </th>
                                </tr>
                            </thead>
                            <?php if($subcategories): ?>

                            <tbody>
                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="tr-challenge-two" style="background-color:<?php echo e($subcategory->color_brand); ?>;">
                                    <td class="sorting">
                                        <label class="checkbox-two path cs-check">
                                            <input id="subcategory-<?php echo e($subcategory->id); ?>" class="check_brands" name="check_subcategory[]" type="checkbox" value="<?php echo e($subcategory->id); ?>" <?php echo e(in_array($subcategory->id, $subcategoriesChallenge) ? 'checked="checked"' : ''); ?>>
                                            <svg viewBox="0 0 21 21">
                                                <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                            </svg>
                                        </label>
                                        <img name="img-subcategory" src="<?php echo e($subcategory->subcategory_image); ?>" alt="<?php echo e($subcategory->subcategory_image); ?>" class=" subcategory-challenge">
                                        <label class="sub-name"><?php echo e($subcategory->name); ?></label>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <?php endif; ?>
                            </label>
                        </table>
                        <?php if($errors->has('check_subcategory')): ?>
                        <span class="help-block">
	                            <strong><?php echo e($errors->first('check_subcategory')); ?></strong>
	                        </span> <?php endif; ?>
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous btn-ch " value="Atras" />
            <input id="btn-filter-brands" type="button" name="next" class="next btn-ch" value="Siguiente"  />
        </fieldset>
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Confirmación del Desafío</h2>
                        <h2 class="fs-title-text">Completa los campos</h2>
                    </div>
                </div>
                <div class="container cn-confirm">
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="form-group <?php echo e($errors->has('name') ? ' has-error ' : ''); ?> nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control input-name-ch', 'placeholder' => 'Nombre del Desafío', 'required')); ?>

                                </div>
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
										<strong><?php echo e($errors->first('name')); ?></strong>
									</span> <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('number_questions') ? ' has-error ' : ''); ?> nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <?php echo Form::number('number_questions', NULL, array('id' => 'number_questions', 'class' => 'form-control input-c-questions', 'placeholder' => 'C/Preguntas', 'min' => "1", 'max'=>"100" , 'required')); ?>

                                </div>
                                <?php if($errors->has('number_questions')): ?>
                                <span class="help-block">
										<strong><?php echo e($errors->first('number_questions')); ?></strong>
									</span> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="form-group <?php echo e($errors->has('end_date') ? ' has-error ' : ''); ?> nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <?php echo Form::text('end_date', NULL, array('id' => 'end_date', 'class' => 'form-control input-confirm datetimepicker-input', 'placeholder' => 'El Desafío termina', 'required')); ?>

                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('end_date')): ?>
                                <span class="help-block">
									<strong>La fecha debe ser mayor o igual al dia actual</strong>
								</span> 
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('state_id') ? ' has-error ' : ''); ?> nav-font">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <select class="form-control input-confirm" name="state_id" id="state_id" required>
                                        <option value="">Seleccione estado</option>
                                        <?php if($states): ?>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>" <?php echo e($challenge->state_id == $state->id ? 'selected="selected"' : ''); ?>><?php echo e($state->state); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <?php if($errors->has('state_id')): ?>
                            <span class="help-block">
                                    <strong><?php echo e($errors->first('state_id')); ?></strong>
                            </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous btn-ch" value="Atras" />
            <button type="submit" class="btn btn-ch">Confirmar!</button>
        </fieldset>
    </div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/edit.blade.php ENDPATH**/ ?>