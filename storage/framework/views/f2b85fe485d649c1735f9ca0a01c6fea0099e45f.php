<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="cotainer">
  <div class="container-fluid">
    <div class="row">
        <div id="canvasContainer" class="container-canvas" onclick="miRuleta.startAnimation()">
          <canvas id='Ruleta' width='700' height='690'>
            Canvas not supported, use another browser.
          </canvas> 
        </div>
      </div>
    </div>
  </div>
</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.Winwheel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.ruleta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/challenge/ruleta.blade.php ENDPATH**/ ?>