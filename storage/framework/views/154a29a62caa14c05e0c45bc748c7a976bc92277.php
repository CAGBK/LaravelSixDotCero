<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="cotainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 text-center"> 
        <div class="card bg-warning">
          <div class="card-body">
            <h4 class="card-title">Lista de elementos:</h4>  
            <textarea id="ListaElementos" class="form-control" rows="13">
              Equipo 1
              Equipo 2
              Equipo 3
              Equipo 4
              Equipo 5
              Equipo 6
              Equipo 7
              Equipo 10
            </textarea>
            <br />
          </div>
        </div>
      </div>
      <div class="col-7 text-center">
        <br/>
        <div id="canvasContainer" onclick="miRuleta.startAnimation()">
          <canvas id='Ruleta' width='700' height='690'>
            Canvas not supported, use another browser.
          </canvas> 
        </div>
      </div>
      <div class="col-2">
        <br/>
      </div>
    </div>
  </div>
</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.Winwheel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.ruleta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/ruleta.blade.php ENDPATH**/ ?>