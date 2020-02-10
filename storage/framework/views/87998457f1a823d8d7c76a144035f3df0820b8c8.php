<?php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

?>

<div class="card card-login">

    <div class="card-header <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> header-card text-white <?php endif; ?>">

        Bienvenido <?php echo e(Auth::user()->name); ?>


        <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?>
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Acceso de Admin
            </span>
        <?php else: ?>
            <span class="pull-right badge badge-warning" style="margin-top:4px">
                Acceso de Access
            </span>
        <?php endif; ?>

    </div>
    <div class="card-body">
        <h2 class="lead">
            ¡Estás conectado!
        </h2>

        <hr>

        <p>
            Tienes acceso de
                <strong>
                    <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                       Admin
                    <?php endif; ?>
                    <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                       User
                    <?php endif; ?>
                </strong>
        </p>

        <hr>

        <p>
           Tienes acceso a niveles: <?php echo e($levelAmount); ?>:
            <?php if (Auth::check() && Auth::user()->level() >= 5): ?>
                <span class="badge badge-primary margin-half">5</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 4): ?>
                <span class="badge badge-info margin-half">4</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 3): ?>
                <span class="badge badge-success margin-half">3</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 2): ?>
                <span class="badge badge-warning margin-half">2</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 1): ?>
                <span class="badge badge-default margin-half">1</span>
            <?php endif; ?>
        </p>

        <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>

            <hr>

            <p>
                Tienes permisos:
                <?php if (Auth::check() && Auth::user()->hasPermission('view.users')): ?>
                    <span class="badge badge-primary margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionView')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('create.users')): ?>
                    <span class="badge badge-info margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionCreate')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('edit.users')): ?>
                    <span class="badge badge-warning margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionEdit')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('delete.users')): ?>
                    <span class="badge badge-danger margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionDelete')); ?>

                    </span>
                <?php endif; ?>

            </p>

        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/panels/welcome-panel.blade.php ENDPATH**/ ?>