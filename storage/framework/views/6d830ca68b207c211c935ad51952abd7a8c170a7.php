<?php $__env->startSection('template_title'); ?>
  Ver Linea
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              Detalle Linea
              <div class="float-right">
                <a href="<?php echo e(route('lineas_marcas')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Volver a las lineas">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Volver a las Lineas
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="clearfix"></div>
            <div class="border-bottom"></div>
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Linea:
              </strong>
            </div>
            <div class="col-sm-7">
              <?php echo e($category->name); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Marcas:
              </strong>
            </div>

            <div class="col-sm-7">
                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($subcategory): ?>
                  <span class="badge " ><?php echo e($subcategory->name); ?></span>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Usuarios:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($category->user): ?>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-info text-white"><?php echo e($user->name); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                No hay usuarios asignados
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Creado:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php echo e($category->created_at); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Modificado:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php echo e($category->updated_at); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('usersmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/linebrand/show-lines.blade.php ENDPATH**/ ?>