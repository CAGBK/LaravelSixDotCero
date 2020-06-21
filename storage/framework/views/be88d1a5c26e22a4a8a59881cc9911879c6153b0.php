<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-login background-login">
                <div style="display: inline-block; text-align: center; margin-bottom: 2rem;">
                    <a class=""  href="<?php echo e(url('/')); ?>">
                        <img id="nav-image" src="/images/logo.png" width="160px" height="80px" alt="">
                    </a>
                </div>
                <div class="header-login login-nav col-md-12"><?php echo e(__('Hola!')); ?>

                </div>
                <label class="col-md-6 text-login col-form-label text-md-right nav-font"><?php echo e(__('registrate con un correo electrónico y contraseña para la aplicación')); ?></label>
                
                <div class=""> 
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="col-md-12 content-align">
                                <input id="email" type="email" class="col-md-7 form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?> input-login" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Correo electrónico">

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                           

                            <div class="col-md-12 content-align">
                                <input id="password" type="password" class="col-md-7 form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?> input-login" name="password" required placeholder="Contraseña">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 center-text-login" >
                                <button type="submit" class="btn-login">
                                    <?php echo e(__('Ingresar')); ?>

                                </button>

                            </div>
                            <div class="col-md-12 center-text-login" >
                            <a class="btn btn-link login-nav">
                                Tienes una cuenta? <a class="btn btn-link login-nav custom-link" href="<?php echo e(route('register')); ?>">
                                    <?php echo e(__('Registrarse')); ?> </a>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DSIT-Saturno-5689A\Documents\LaravelSixDotCero\resources\views/auth/login.blade.php ENDPATH**/ ?>