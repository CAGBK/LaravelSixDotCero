<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
      <?php if($question): ?>
      <div class="card-header text-white text-center" style="background-color: <?php echo e($question->cquestion->color); ?>">
          <span style="font-size: 40px"><?php echo e($question->question_name); ?></span>
        </div>
        <div class="card-body">
          <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div style="border-radius: 1rem;border: 1px <?php echo e($question->cquestion->color); ?> solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="<?php echo e(URL::to('answer/' . $answer->id . '/' . $challenge->id)); ?>" style="text-decoration:none;color:#000;">
            <p class="pregunta-text"><?php echo e($answer->name); ?></p>
          </a></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/challenge/preguntas.blade.php ENDPATH**/ ?>