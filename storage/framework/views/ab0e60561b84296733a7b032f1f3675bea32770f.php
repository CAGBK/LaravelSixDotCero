<?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="row">
            <div class="col-12 nav-lchallenge">
                <h2 class="text ch-text fs-title">Desafíos</h2>
                <h3 class="text ch-text-two text-white">Te han invitado a un desafío :</h3>
                <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
            </div>
        </div> 
        <div class="form-group has-feedback row <?php echo e($errors->has('user_id') ? ' has-error ' : ''); ?> nav-font">
            <div class="col-md-12">
                <table id="users-check" class="table tfoot td no-footer ">
                    <thead>
                        <tr>
                            <th style="display:none">
                                a
                            </th>
                        </tr>
                    </thead>
                    <?php if($users): ?>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="column-list-challenge">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/list.blade.php ENDPATH**/ ?>