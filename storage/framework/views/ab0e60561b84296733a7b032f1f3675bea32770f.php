<?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="row">
        <div class="col-12 nav-lchallenge">
            <h2 class="text ch-text fs-title-list">Desafíos</h2>
            <h3 class="text ch-text-two text-white">Te han Desafiado:</h3>
            <input type="button" name="" class="nav-button-ch" value="Crear Desafío" onclick="location.href='challenge'"  /> 
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
            <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($challenge->users): ?>
                <?php 
                $arrayUsers = json_decode($challenge->users);
                ?>
                <?php $__currentLoopData = $arrayUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user == Auth()->user()->id): ?>
                        <div class="" data-toggle="modal" data-target="#challengeModal<?php echo e($challenge->id); ?>">
                            <div class="card-challenge-list" style="background-color: <?php $__currentLoopData = $challenge->challengeus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($element->user_id == Auth()->user()->id): ?><?php echo e($element->state->color); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                <div class="col-sm-7">
                                    <label  class="lb-list-challenge" for="xx"><i class="fa fa-trophy text-white ctrophy" aria-hidden="true"></i>Puesto 0/0</label>
                                    <hr class="text-white hr-challenge" >
                                    <img src="/images/hospital.png" class="list-img-challenge" alt="">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div style="margin-top: 2rem;">
            <h3><strong>Desafios creados por usted pero no participa</strong></h3>
            <hr class="line-style" >
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
            <div class="" data-toggle="modal" data-target="#challengeModal<?php echo e($challenge->id); ?>">
                <div class="card-challenge-list" style="background-color:<?php echo e($challenge->state->color); ?>">
                    <div class="col-sm-7">
                    <label  class="lb-list-challenge" for="xx"><i class="fa fa-trophy text-white ctrophy" aria-hidden="true"></i>Puesto 0/10</label>
                        <hr class="text-white hr-challenge" >
                        <img src="/images/hospital.png" class="list-img-challenge" alt="">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('modals.modal-challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/list.blade.php ENDPATH**/ ?>