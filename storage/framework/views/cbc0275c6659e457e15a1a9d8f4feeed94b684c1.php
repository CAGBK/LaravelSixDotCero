<?php $__env->startSection('template_title'); ?>
    Preguntas y Respuestas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card card-login">
                    <div class="card-header header-card text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Crear preguntas y respuestas
                            <div class="pull-right">
                                <a href="<?php echo e(route('preguntas_respuestas')); ?>" class="btn button-card" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Voler a la Lista de Preguntas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="<?php echo e(route('ruta_new_question')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group has-feedback row <?php echo e($errors->has('question') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('question', 'Pregunta', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::text('question', NULL, array('id' => 'question', 'class' => 'form-control', 'placeholder' => 'Pregunta...')); ?>

                                            <div class="input-group-append">
                                                <label for="question" class="input-group-text">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php if($errors->has('question')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('question')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('state_id') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('state_id', 'Estado', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="state_id" id="state_id">
                                                <option value="">Seleccione estado</option>
                                                <?php if($states): ?>
                                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
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
                                <div class="form-group has-feedback row <?php echo e($errors->has('answer[]') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('answer[]', 'Respuesta 1', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Pregunta...')); ?>

                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="0">
                                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('answer[]')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('answer[]')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('answer[]') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('answer[]', 'Respuesta 2', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 2')); ?>

                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="1">
                                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('answer[]')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('answer[]')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('answer[]') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('answer[]', 'Respuesta 3', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 3')); ?>

                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="2">
                                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('answer[]')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('answer[]')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('answer[]') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('answer[]', 'Respuesta 4', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <?php echo Form::text('answer[]', NULL, array('id' => 'answer[]', 'class' => 'form-control', 'placeholder' => 'Respuesta 4')); ?>

                                            <div class="input-group-append">
                                                <label for="answer[]" class="input-group-text">
                                                    <i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?> nav-font" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check ">
                                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="3">
                                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('answer[]')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('answer[]')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row <?php echo e($errors->has('cquestion_id') ? ' has-error ' : ''); ?> nav-font">
                                    <?php echo Form::label('cquestion_id', 'Categoria de Pregunta', array('class' => 'col-md-3 control-label'));; ?>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="cquestion_id" id="cquestion_id">
                                                <option value="">Seleccione categoria de pregunta</option>
                                                <?php if($cquestions): ?>
                                                    <?php $__currentLoopData = $cquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cquestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($cquestion->id); ?>"><?php echo e($cquestion->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="cquestion_id">
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
                                <?php if (Auth::check() && Auth::user()->hasPermission('create.question')): ?>
                                <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">
                                    Crear Nueva Pregunta
                                </button>  
                                <?php endif; ?>
                            </form>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.toggleStatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/questionanswer/new.blade.php ENDPATH**/ ?>