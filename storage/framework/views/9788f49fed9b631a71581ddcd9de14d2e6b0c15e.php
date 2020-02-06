<!--This allows the view o take the layout the home view has in order to use it.-->

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Linea</div>

              <div class="card-body">
                  <form action="<?php echo e(route('ruta_new_line')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de Linea</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" required autofocus>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Descripción</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pregunta</label>
                        <select name="question" id="question" class="form-control js-example-basic-single" >
                            <option value="" >Seleccione una Pregunta</option>
                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($question->id); ?>"><?php echo e($question->question_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
$('.js-example-basic-single').select2();
});

$(document).ready(function() {
$('.js-example-basic-multiple').select2();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/linebrand/new.blade.php ENDPATH**/ ?>