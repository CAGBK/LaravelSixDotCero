<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-login background-login">
                <div class="card-body">
                    
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <img id="data-img" name="image_progile" src="/images/Perfil.png" class="user-avatar-register">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="name" type="text" class="lb-register form-control col-md-7<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="Nombre de usuario"required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="first_name" type="text" class="lb-register form-control col-md-7<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="Primer Nombre"required autofocus>

                                <?php if($errors->has('first_name')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="last_name" type="text" class="lb-register form-control col-md-7<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="Apellidos"required autofocus>

                                <?php if($errors->has('last_name')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="email" type="email" class="lb-register form-control col-md-7<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Correo electrónico"required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="password" type="password" class="lb-register form-control col-md-7<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Contraseña"required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 content-align">
                                <input id="password-confirm" type="password" class="lb-register form-control col-md-7" name="password_confirmation" placeholder="Confirme contraseña"required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-4 content-align offset-md-4">
                                <button type="submit" class="btn-login">
                                    <?php echo e(__('Registrar')); ?>

                                </button>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: -webkit-center;">
                            <a class="btn btn-link login-nav">
                                Tienes una cuenta? <a class="btn btn-link login-nav custom-link" href="<?php echo e(route('login')); ?>">
                                    <?php echo e(__('Ingresar')); ?> </a>
                                </div>
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('modals.modal-img', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('scripts.user-avatar-dz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/auth/register.blade.php ENDPATH**/ ?>