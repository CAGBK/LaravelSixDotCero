<?php $__env->startSection('template_title'); ?>
    Todas las preguntas
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-login">
                    <div class="card-header header-card text-white">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Todas las preguntas
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <?php if (Auth::check() && Auth::user()->hasPermission('view.create.question')): ?>
                                <button type="button" class="btn btn-default dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        <?php echo trans('usersmanagement.users-menu-alt'); ?>

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item nav-font" href="<?php echo e(route('create_question')); ?>">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Crear Pregunta
                                    </a>
                                    <a class="dropdown-item nav-font" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Preguntas Inactivas
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if(config('usersmanagement.enableSearchUsers')): ?>
                            <?php echo $__env->make('partials.search-users-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count" class="nav-fonct">
                                    <?php echo e(trans_choice('questionsmanagement.questions-table.caption', 1, ['questionscount' => $questions->count()])); ?>

                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>Pregunta</th>
                                        <th>Estado</th>
                                        <th>Respuestas</th>
                                        <th>C.Preguntas</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th>Acción</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($question->question_name); ?></td>
                                            <td>
                                                <?php echo e($question->state->state); ?>

                                            </td>
                                            <td>
                                            <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <span class="badge text-white" style="background-color:<?php echo e($answer->state->color); ?>"><?php echo e($answer->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            </td>
                                            <td>
                                                <span class="badge text-white" style="background-color:<?php echo e($question->cquestion->color); ?>"><?php echo e($question->cquestion->name); ?></span>
                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md"><?php echo e($question->created_at); ?></td>
                                            <td class="hidden-sm hidden-xs hidden-md"><?php echo e($question->updated_at); ?></td>
                                            <td>
                                                <?php echo Form::open(array('url' => 'question/' . $question->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')); ?>

                                                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                    <?php echo Form::button(trans('questionsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Borrar Pregunta', 'data-message' => '¿Estás seguro de que deseas eliminar a esta pregunta?')); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                            <?php if (Auth::check() && Auth::user()->hasPermission('detail.question')): ?>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="<?php echo e(route('show_question',['id' => $question->id])); ?>" data-toggle="tooltip" title="Show">
                                                    <?php echo trans('questionsmanagement.buttons.show'); ?>

                                                </a>
                                            </td>
                                            <?php endif; ?>
                                            <?php if (Auth::check() && Auth::user()->hasPermission('view.edit.question')): ?>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('question/' . $question->id . '/edit')); ?>" data-toggle="tooltip" title="Edit">
                                                    <?php echo trans('questionsmanagement.buttons.edit'); ?>

                                                </a>
                                            </td>
                                            <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/questionanswer/list.blade.php ENDPATH**/ ?>