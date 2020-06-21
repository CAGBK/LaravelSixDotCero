<?php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

?>

<div class="card card-login">

    <div class="card-header header-card   text-white">

        Bienvenido <?php echo e(Auth::user()->name); ?>


        <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?>
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Acceso de Administrador
            </span>
        <?php else: ?>
            <span class="pull-right badge text-white" style="margin-top:4px ; background-color: #ffc107;">
                Acceso de Usuario
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
            <hr>
            <p>
                <center><a href="<?php echo e(url('/challenge-list')); ?>" class="btn text-white" style="background-color: #2cab66;">¡Crea un Desafio!</a></center>
            </p>
    </div>
</div>
<?php /**PATH C:\Users\dsgut\Desktop\SW\LaravelSixDotCero\resources\views/panels/welcome-panel.blade.php ENDPATH**/ ?>