<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div style="background-color:#272727" class="md-12">
  <h1 style="color:#2cab66; margin: -24px 0px -15px 45px;" class="font-weight-bold"><?php echo e($challenge->name); ?></h1>
  <br>
  <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1 style="color:#2cab66; margin: 0px 0px 0px 45px;" class="font-weight-bold text-white">Puntos: <?php echo e($point->score); ?></h1>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <br>
</div>
<section class="cotainer">
  <?php if(session()->has('correcto')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Bien!</strong> <?php echo e(session('correcto')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <?php if(session()->has('fallo')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> <?php echo e(session('fallo')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="row">
      <div id="canvasContainer" class="container-canvas" onclick="miRuleta.startAnimation()">
        <canvas id='Ruleta' width='700' height='690' data-responsiveMinWidth="180" data-responsiveScaleHeight="true" data-responsiveMargin="50">
            Canvas not supported, use another browser.
        </canvas> 
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.Winwheel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.ruleta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.challenge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/challenge/ruleta.blade.php ENDPATH**/ ?>