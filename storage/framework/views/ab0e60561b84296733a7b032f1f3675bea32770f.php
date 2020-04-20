<?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-lchallenge">
            <h2 class="text ch-text fs-title-list">Desafíos</h2>
            <h3 class="text ch-text-two text-white">Te han invitado a un desafío :</h3>
            <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
        </div>
    </div> 
</div> 
<div class="container">
        <div style="margin-top: 2rem;">
            <h2><strong>Desafios creados por usted pero no participa</strong></h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $arrayUser = Auth()->user()->id;
                $arrayUsers = json_decode($challenge->users);
                $inGame = in_array($arrayUser, $arrayUsers);
            ?>
            <?php if($inGame === false): ?>
            <?php if($challenge->user_id === Auth()->user()->id): ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box" style="background-color: <?php echo e($challenge->state->color); ?> ">
                        <div class="inner">
                            <p>
                                <strong>
                                    <?php echo e($challenge->name); ?>

                                </strong>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gamepad" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal<?php echo e($challenge->id); ?>">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div style="margin-top: 2rem;">
            <h2><strong>Desafios en los que participa</strong></h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($challenge->users): ?>
                <?php 
                $arrayUsers = json_decode($challenge->users);
                ?>
                <?php $__currentLoopData = $arrayUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user == Auth()->user()->id): ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card-box" style="background-color: <?php $__currentLoopData = $challenge->challengeus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($element->user_id == Auth()->user()->id): ?><?php echo e($element->state->color); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                <div class="inner">
                                    <p>
                                        <strong>
                                            <?php echo e($challenge->name); ?>

                                        </strong>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                                </div>
                                <a href="#" class="card-box-footer" data-toggle="modal" data-target="#challengeModal<?php echo e($challenge->id); ?>">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('modals.modal-challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/list.blade.php ENDPATH**/ ?>