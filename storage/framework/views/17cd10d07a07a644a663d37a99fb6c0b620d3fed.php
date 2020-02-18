<?php $__env->startSection('template_title'); ?>
    Todas las Lineas y Marcas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php if(config('usersmanagement.enabledDatatablesJs')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('usersmanagement.datatablesCssCDN')); ?>">
    <?php endif; ?>
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row ">
    <div class="col-md-6 col-lg-6">
      <div class="card card-login">
        <div class="card-header header-card ">
          <div class="text-white" style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Todas las Lineas
          </span>
          <div class="btn-group pull-right btn-group-xs">
              <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                  <span class="sr-only">
                      <?php echo trans('usersmanagement.users-menu-alt'); ?>

                  </span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item nav-font" href="<?php echo e(route('create_line')); ?>">
                      <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                      Crear Linea
                  </a>
                  <a class="dropdown-item nav-font" href="/users/deleted">
                      <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                      Lineas Inactivas
                  </a>
              </div>
          </div>
          </div>
        </div>
        <div class="card-body">

          <?php if(config('usersmanagement.enableSearchUsers')): ?>
              <?php echo $__env->make('partials.search-users-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
          <div class="table-responsive users-table">
              <table class="table table-striped table-sm data-table">
                  <caption id="user_count" class="nav-font">
                      <?php echo e(trans_choice('linebrandmanagement.linebrand-table.captionline', 1, ['linescount' => $categories->count()])); ?>

                  </caption>
                  <thead class="thead">
                      <tr>
                          <th><i class = "fa fa-user"> </i>Nombre Linea</th>
                          <th>Marcas</th>
                          <th>Creado</th>
                          <th>Modificado</th>
                          <th>Acción</th>
                          <th class="no-search no-sort"></th>
                          <th class="no-search no-sort"></th>
                      </tr>
                  </thead>
                  <tbody id="users_table">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e($category->name); ?></td>
                              <td>
                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge " ><?php echo e($subcategory->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                              </td>
                              <td class="hidden-sm hidden-xs hidden-md"><?php echo e($category->created_at); ?></td>
                              <td class="hidden-sm hidden-xs hidden-md"><?php echo e($category->updated_at); ?></td>
                              <td>
                                  <?php echo Form::open(array('url' => 'question/' . $category->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')); ?>

                                      <?php echo Form::hidden('_method', 'DELETE'); ?>

                                      <?php echo Form::button(trans('linebrandmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Linea', 'data-message' => '¿Estás seguro de que deseas eliminar a esta Linea?')); ?>

                                  <?php echo Form::close(); ?>

                              </td>
                              <td>
                                  <a class="btn btn-sm btn-success btn-block" href="<?php echo e(route('show_question',['id' => $category->id])); ?>" data-toggle="tooltip" title="Show">
                                      <?php echo trans('linebrandmanagement.buttons.show'); ?>

                                  </a>
                              </td>
                              <td>
                                  <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('users/' . $category->id . '/edit')); ?>" data-toggle="tooltip" title="Edit">
                                      <?php echo trans('linebrandmanagement.buttons.edit'); ?>

                                  </a>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>

              </table>
          </div>
      </div> 
        </div>
      </div>
    <div class="col-md-6">
      <div class="card card-login">
        
        <div class="card-header header-card">
          <div class="text-white" style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">
              Todas las Marcas
          </span>

          <div class="btn-group pull-right btn-group-xs">
              <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                  <span class="sr-only">
                      <?php echo trans('usersmanagement.users-menu-alt'); ?>

                  </span>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item nav-font" href="<?php echo e(route('create_brand')); ?>">
                      <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                      Crear Marca
                  </a>
                  <a class="dropdown-item nav-font" href="/users/deleted">
                      <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                      Marcas Inactivas
                  </a>
              </div>
          </div>
          </div>
        </div>
        <div class="card-body">

          <?php if(config('usersmanagement.enableSearchUsers')): ?>
              <?php echo $__env->make('partials.search-users-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
          <div class="table-responsive users-table">
              <table class="table table-striped table-sm data-table">
                  <caption id="user_count" class="nav-font">
                      <?php echo e(trans_choice('linebrandmanagement.linebrand-table.caption', 1, ['brandscount' => $subcategories->count()])); ?>

                  </caption>
                  <thead class="thead">
                      <tr>
                          <th>Nombre Marca</th>
                          <th>Preguntas</th>
                          <th>Creado</th>
                          <th>Modificado</th>
                          <th>Acción</th>
                          <th class="no-search no-sort"></th>
                          <th class="no-search no-sort"></th>
                      </tr>
                  </thead>
                  <tbody id="users_table">
                      <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e($subcategory->name); ?></td>
                              <td>
    
                                <?php $__currentLoopData = $subcategory->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge text-white" style="background-color:<?php echo e($question->state->color); ?>"><?php echo e($question->question_name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>
                              </td>
                              <td class="hidden-sm hidden-xs hidden-md"><?php echo e($subcategory->created_at); ?></td>
                              <td class="hidden-sm hidden-xs hidden-md"><?php echo e($subcategory->updated_at); ?></td>
                              <td>
                                  <?php echo Form::open(array('url' => 'question/' . $subcategory->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')); ?>

                                      <?php echo Form::hidden('_method', 'DELETE'); ?>

                                      <?php echo Form::button(trans('linebrandmanagement.buttonsbrand.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Marca', 'data-message' => '¿Estás seguro de que deseas eliminar a esta Marca?')); ?>

                                  <?php echo Form::close(); ?>

                              </td>
                              <td>
                                  <a class="btn btn-sm btn-success btn-block" href="<?php echo e(route('show_question',['id' => $subcategory->id])); ?>" data-toggle="tooltip" title="Show">
                                      <?php echo trans('linebrandmanagement.buttonsbrand.show'); ?>

                                  </a>
                              </td>
                              <td>
                                  <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('users/' . $subcategory->id . '/edit')); ?>" data-toggle="tooltip" title="Edit">
                                      <?php echo trans('linebrandmanagement.buttonsbrand.edit'); ?>

                                  </a>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>

              </table>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/linebrand/list.blade.php ENDPATH**/ ?>