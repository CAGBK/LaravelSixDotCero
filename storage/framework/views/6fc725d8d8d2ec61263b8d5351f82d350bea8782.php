<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
        <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questiona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card-header text-white text-center" style="background-color: <?php echo e($questiona->cquestion->color); ?>">
          <span style="font-size: 40px"><?php echo e($questiona->question_name); ?></span>
        </div>
        <div class="card-body">
          <?php $__currentLoopData = $questiona->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div style="border-radius: 1rem;border: 1px <?php echo e($questiona->cquestion->color); ?> solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="<?php echo e(URL::to('answer/' . $answer->id . '/' . $challenge->id)); ?>" style="text-decoration:none;color:#000;">
            <p class="pregunta-text"><?php echo e($answer->name); ?></p>
          </a></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/challenge/preguntas.blade.php ENDPATH**/ ?>