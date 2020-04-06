<nav id="main-nav" class="navbar navbar-expand-md navbar-light navbar-laravel nav-color">
    <div class="container">
        <div style=" display: inline-block; text-align: center;">
            <a class=""  href="<?php echo e(url('/home')); ?>">
                <img id="nav-image" src="/images/logo.png" width="160px" height="80px" alt="">
            </a>
        </div>
        <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
        </button>
        <?php endif; ?>
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
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo trans('titles.adminGame'); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-font <?php echo e(Request::is('lineas-marcas') ? 'active' : null); ?>" href="<?php echo e(url('lineas-marcas')); ?>">
                            <?php echo trans('titles.lines'); ?>

                        </a>
                        
                        <a class="dropdown-item nav-font <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(url('/preguntas-respuestas')); ?>">
                            <?php echo trans('titles.questions'); ?>

                        </a>
                        
                        <a class="dropdown-item nav-font <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(url('/challenge-list')); ?>">
                            <?php echo trans('titles.challenges'); ?>

                        </a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo trans('titles.adminGame'); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-font <?php echo e(Request::is('lineas-marcas') ? 'active' : null); ?>" href="<?php echo e(url('lineas-marcas')); ?>">
                            <?php echo trans('titles.lines'); ?>

                        </a>
                        
                        <a class="dropdown-item nav-font <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(url('/preguntas-respuestas')); ?>">
                            <?php echo trans('titles.questions'); ?>

                        </a>
                        
                        <a class="dropdown-item nav-font <?php echo e(Request::is('blocker') ? 'active' : null); ?>" href="<?php echo e(url('/challenge-list')); ?>">
                            <?php echo trans('titles.challenges'); ?>

                        </a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                
                <?php if(auth()->guard()->guest()): ?>
                    
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
</nav>
<script type="application/javascript">
    var URLactual = window.location;
    var host = location.hostname;
    var element = document.getElementById("main-nav");
    if(URLactual=="http://"+host+"/login" || URLactual=="http://"+host+":8000/login" || URLactual=="http://"+host+":8000/"){
        document.getElementById("nav-image").src = "/images/logoB.png";
        document.getElementById("nav-image").style.display = "none";
    } else if(URLactual=="http://"+host+"/register" || URLactual=="http://"+host+":8000/register"){
        document.getElementById("nav-image").src = "/images/logoB.png";
        document.getElementById("nav-image").style.display = "none";
    }else{
        document.getElementById("nav-image").src = "/images/logoB.png";
        element.classList.add("nav-color-home");
    }
</script>
<?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\resources\views/partials/nav.blade.php ENDPATH**/ ?>