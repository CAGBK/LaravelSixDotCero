<!--This allows the view o take the layout the home view has in order to use it.-->

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Crear Preguntas</div>

              <div class="card-body">
                  <form action="<?php echo e(route('ruta_new_question')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>

                      <div class="form-group row">
                          <label for="question" class="col-md-4 col-form-label text-md-right">Pregunta</label>
                          <div class="col-md-4">
                              <input id="question" type="text" class="form-control" name="question" required autofocus>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Estado Pregunta')); ?></label>
                        <select class="form-control col-form-label text-md-right col-md-4 <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="state_id" id="state_id">
                                <option value="" >Seleccione un Estado</option>
                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stat->id); ?>" ><?php echo e($stat->state); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 1</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="0">
                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 2</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="1">
                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 3</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="2">
                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group row">
                        <label for="answer" class="col-md-4 col-form-label text-md-right">Respuesta 4</label>
                        <div class="col-md-4">
                            <input id="answer[]" type="text" class="form-control" name="answer[]" required autofocus>
                        </div>
                        <?php $__currentLoopData = $statesanswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check ">
                            <input type="radio" class="form-check-input" name="state[]" id="state[]" value="3">
                                <label class="form-check-label" for="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></label>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Guardar
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script type="application/javascript">
    $( "input" ).on( "click", function() {
    $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/questionanswer/new.blade.php ENDPATH**/ ?>