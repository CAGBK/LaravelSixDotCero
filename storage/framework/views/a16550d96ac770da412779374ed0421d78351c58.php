<?php $__env->startSection('template_title'); ?>
    Desafíos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-report-challenge">
            <h2 class="text ch-text fs-title-list">Reporte de Desafio</h2>
            <h3 class="text ch-text-two text-white"><?php echo e($challenge->name); ?></h3>
        </div>
    </div> 
</div>
<?php if(session()->has('fallo')): ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Advertencia!</strong> <?php echo e(session('fallo')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?> 
<div class="container">
        <div class="row " style="margin-top: 2rem;">
            
           
        </div>
        
        <div style="margin-top: 2rem;">
            <hr class="line-style" >
        </div>
        <div class="form-group has-feedback row <?php echo e($errors->has('check_user') ? ' has-error ' : ''); ?> ">
                    <div class="col-md-12">
                        <table id="challenge-report" class="table-report">
                            <thead style="display:none;">
                                <tr>
                                    <th class="sorting_asc">
                                        Number
                                    </th>
                                    <th class="sorting_asc">
                                        Image
                                    </th>
                                    <th class="sorting_asc">
                                        Name
                                    </th>
                                    <th class="sorting_asc">
                                        Poin
                                    </th>
                                </tr>
                            </thead>
                            <?php if($users): ?>
                            <tbody >
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="tr-challenge-report">
                                    <td class="sorting">
                                        <label name="img-user" class="label-challenge-iteration" for=""><?php echo e($loop->iteration); ?> </label>
                                    </td>
                                    <td>
                                        <img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="user-avatar-nav user-challenge-report">
                                    </td>
                                    <td class="trophy-report" >
                                        <label name="img-user" class="label-challenge-name" for=""><?php echo e($user->name); ?> </label>  
                                        <?php if($loop->first): ?>
                                            <i class="fa fa-trophy insigts-gold" aria-hidden="true"></i>
                                        <?php endif; ?> 
                                        <?php if($loop->iteration == 2): ?>
                                            <i class="fa fa-trophy insigts-silver" aria-hidden="true"></i>
                                        <?php endif; ?>
                                        <?php if($loop->iteration == 3): ?>
                                            <i class="fa fa-trophy insigts-bronze" aria-hidden="true"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="tr-challenge-points">
                                        <label name="img-user" onmouseover="this.style.color='#93bf1c'"  onmouseout="this.style.color='#272727'"  class="label-challenge-points" for=""><?php echo e($user->score); ?> Puntos</label>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.reports', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DSIT-Saturno-5689A\Documents\LaravelSixDotCero\resources\views/challenge/reports/challenge.blade.php ENDPATH**/ ?>