<nav id="main-nav" class="navbar navbar-expand-md navbar-dark nav-color-home">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
        </button>
        <div style=" display: inline-block; text-align: center;">
            <a class=""  href="<?php echo e(url('/home')); ?>">
                <img id="nav-image " src="/images/logoB.png" class="image-nav" width="160px" height="80px" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo trans('titles.adminDropdownNav'); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item nav-font <?php echo e((Request::is('roles') || Request::is('permissions')) ? 'active' : null); ?>" href="<?php echo e(route('laravelroles::roles.index')); ?>">
                                <?php echo trans('titles.laravelroles'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null); ?>" href="<?php echo e(url('/users')); ?>">
                                <?php echo trans('titles.adminUserList'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('users/create') ? 'active' : null); ?>" href="<?php echo e(url('/users/create')); ?>">
                                <?php echo trans('titles.adminNewUser'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('themes','themes/create') ? 'active' : null); ?>" href="<?php echo e(url('/themes')); ?>">
                                <?php echo trans('titles.adminThemesList'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('logs') ? 'active' : null); ?>" href="<?php echo e(url('/logs')); ?>">
                                <?php echo trans('titles.adminLogs'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('phpinfo') ? 'active' : null); ?>" href="<?php echo e(url('/activity')); ?>">
                                <?php echo trans('titles.adminActivity'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('phpinfo') ? 'active' : null); ?>" href="<?php echo e(url('/phpinfo')); ?>">
                                <?php echo trans('titles.adminPHP'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('routes') ? 'active' : null); ?>" href="<?php echo e(url('/routes')); ?>">
                                <?php echo trans('titles.adminRoutes'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('active-users') ? 'active' : null); ?>" href="<?php echo e(url('/active-users')); ?>">
                                <?php echo trans('titles.activeUsers'); ?>

                            </a>
                            
                            <a class="dropdown-item nav-font <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(route('laravelblocker::blocker.index')); ?>">
                                <?php echo trans('titles.laravelBlocker'); ?>

                            </a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasPermission('menu.juego')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo trans('titles.adminGame'); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (Auth::check() && Auth::user()->hasPermission('view.lines')): ?>
                        <a class="dropdown-item nav-font <?php echo e(Request::is('lineas-marcas') ? 'active' : null); ?>" href="<?php echo e(url('lineas-marcas')); ?>">
                            <?php echo trans('titles.lines'); ?>

                        </a>
                        <?php endif; ?>
                        <?php if (Auth::check() && Auth::user()->hasPermission('view.questions')): ?>
                            <a class="dropdown-item nav-font <?php echo e(Request::is('preguntas-respuestas') ? 'active' : null); ?>" href="<?php echo e(url('/preguntas-respuestas')); ?>">
                                <?php echo trans('titles.questions'); ?>

                            </a>
                        <?php endif; ?>
                        <a class="dropdown-item nav-font <?php echo e(Request::is('challenge-list') ? 'active' : null); ?>" href="<?php echo e(url('/challenge-list')); ?>">
                            <?php echo trans('titles.challenges'); ?>

                        </a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
            
            
            <ul class="navbar-nav ml-auto">
                
                <?php if(auth()->guard()->guest()): ?>
                    
                <?php else: ?>
                    <li class="nav-item dropdown" onclick="markNotificationAsRead()" style="margin-right: 1rem;">
                        <a id="navbarDropdown" class="text-white nav-notification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-bell"></i><span class="badge badge-info"><?php echo e(count(Auth()->user()->unreadNotifications)); ?></span>
                        </a>
                        <ul class="notification-menu dropdown-menu">
                            <li class="notification-head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>Notificaciones (<?php echo e(count(Auth()->user()->unreadNotifications)); ?>)</span>
                                    </div>
                                </div>
                            </li>
                            <?php $__empty_1 = true; $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                            
                                <?php echo $__env->make('partials.notification.replied_to_thread', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                            <li class="notification-footer bg-dark text-center">
                                <a href="/challenge-list" class="text-light">Ver Todos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1): ?>
                                <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="user-avatar-nav">
                            <?php else: ?>
                                <div class="user-avatar-nav"></div>
                            <?php endif; ?>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item nav-font <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>">
                                <?php echo trans('titles.profile'); ?>

                            </a>
                            <a class="dropdown-item nav-font" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Salir')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\LaravelSixDotCero\resources\views/partials/nav.blade.php ENDPATH**/ ?>