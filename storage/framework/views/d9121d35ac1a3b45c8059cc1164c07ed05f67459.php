<?php $__env->startSection('content'); ?>
<div class="container">
  <section class="text-center col-md-12 col-sm-12">
    <h2>Preguntas y Respuestas</h2>
  </section>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-default">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Preguntas 
            </span>
            <span class="">
              <a href="<?php echo e(route('create_question')); ?>"><i class="fas fa-plus"></i> Crear Pregunta y Respuestas</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <span class="badge badge-light">
                    Pregunta: <strong><?php echo e($question->question_name); ?></strong>
                </span>
                <div class="text-right">
                  <span class="badge badge-pill badge-success">
                    <small>
                      1 Pregunta
                    </small>
                  </span>
                  <span class="badge badge-pill badge-primary">
                    <small>
                      # permisos
                    </small>
                  </span>
                </div>
              </div>
              <div id="collapse_roles_1" class="collapse" data-parent="#accordion_roles_1" >
                <table class="table table-striped table-sm mt-3">
                  <caption>
                    Nombre
                  </caption>
                  <thead>
                    <tr>
                      <th>Pregunta</th>
                      <th>Respuestas</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo e($question->question_name); ?></td>
                      <td>
                      <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($answer->name); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                      <td>email</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </ul>
          </div>
        </div>
      </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/questionanswer/list.blade.php ENDPATH**/ ?>