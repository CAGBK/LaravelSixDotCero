<?php $__env->startSection('template_title'); ?>
  Crear Desafio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="banner-challenge-questions">
  <div class="col-sm-7">
    <?php 
    $arrayUsers = json_decode($challenge->users);
    ?>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $arrayUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($value == $user->id): ?>
            <!--img src="<?php echo e(Gravatar::get($user->email)); ?>" class="user-avatar-nav user-challenge"-->
            <span class="badge badge-info"><?php echo e($user->name); ?></span>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </div>
</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-question">
      <?php if($question): ?>
      <div class="card-header text-white text-center" onclick="document.body.style.backgroundColor = 'green';" style="background-color: <?php echo e($question->cquestion->color); ?>">
        <div class="text-left">
          <label class="question-lb" for="">Pregunta</label>
        </div>
        <div>
          <label class="question-label-name"><?php echo e($question->question_name); ?></label>
        </div>
        </div>
        <div class="card-body">
          <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div onMouseOver="this.style.color='#0F0'" style="border-radius: 1rem;border: 2px <?php echo e($question->cquestion->color); ?> solid;opacity: .5; margin: 5px;" class="col-md-12 text-center"><a href="<?php echo e(URL::to('answer/' . $answer->id . '/' . $challenge->id)); ?>" style="text-decoration:none;color:#000;">
            <p onMouseOver="this.style.color='<?php echo e($question->cquestion->color); ?>'" onMouseOut="this.style.color='#000'" class="answer-text"><?php echo e($answer->name); ?></p>
          </a></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/challenge/preguntas.blade.php ENDPATH**/ ?>