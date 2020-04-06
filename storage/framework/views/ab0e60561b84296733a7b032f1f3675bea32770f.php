<?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-lchallenge">
            <h2 class="text ch-text fs-title">Desafíos</h2>
            <h3 class="text ch-text-two text-white">Te han invitado a un desafío :</h3>
            <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
        </div>
    </div> 
</div> 
<div class="container">
        <div class="row">
            <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box" style="background-color: <?php echo e($challenge->state->color); ?>">
                        <div class="inner">
                            <h3 class="text-center"> 1/5</h3>
                            <p>
                                <?php echo e($challenge->name); ?>

                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gamepad" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal<?php echo e($challenge->id); ?>">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('modals.modal-challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/list.blade.php ENDPATH**/ ?>