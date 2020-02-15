<?php $__env->startSection('content'); ?>
<div class="container">
  <section class="text-center col-md-12 col-sm-12">
    <h2>Lineas  y Marcas</h2>
  </section>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-default">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Lineas
            </span>
            <span class="">
              <a href="<?php echo e(route('create_line')); ?>"><i class="fas fa-plus"></i> Crear Linea</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <span class="badge badge-light">
                    Pregunta: <strong><?php echo e($category->question_name); ?></strong>
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
                      <th>User id</th>
                      <th>User Name</th>
                      <th>user email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>id</td>
                      <td>name</td>
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
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Marcas
            </span>
            <span class="">
              <a href="<?php echo e(route('create_brand')); ?>"><i class="fas fa-plus"></i> Crear Marca</a>
            </span>
          </div>
        </div>
        <div class="list-group-flush flex-fill">
          <ul class="list-group list-group-flush">
            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li id="accordion_roles_1" class="list-group-item accordion list-group-item-action accordion-item collapsed" data-toggle="collapse" href="#collapse_roles_1">
              <div class="d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Show">
                <i class="fas fa-plus"> <?php echo e($subcategory->name); ?></i> 
                <div class="text-right">
                  <span class="badge badge-pill badge-success">
                    <small>
                      1 Usuarios
                    </small>
                  </span>
                  <span class="badge badge-pill badge-primary">
                    <small>
                      # permisos
                    </small>
                  </span>
                </div>
              </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Activar Lineas
            </span>
            <span>
              <a href="<?php echo e(route('create_question_answer')); ?>"><i class="fas fa-plus"></i> Relacionar Lineas - Marcas</a>
            </span>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Linea</th>
                <th>Marca</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->question_name); ?></td>
                <td>
                   <?php $__currentLoopData = $category->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span style="background-color:<?php echo e($subcategory->state->color); ?>!important;" class="badge badge-primary"><?php echo e($item->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Activar Lineas
            </span>
            <span>
            </span>
          </div>
        </div>
        <div class="card-body">
            I'm .
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/linebrand/list.blade.php ENDPATH**/ ?>