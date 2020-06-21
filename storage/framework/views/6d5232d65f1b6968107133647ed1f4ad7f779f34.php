<?php $__env->startSection('template_title'); ?>
	<?php echo e(trans('titles.activation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card card-default header-card text-white">
					<div class="card-header"><?php echo e(trans('titles.activation')); ?></div>
					<div class="card-body">
						<p><?php echo e(trans('auth.regThanks')); ?></p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p><?php echo e(trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] )); ?></p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p><?php echo e(trans('auth.clickInEmail')); ?></p>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
						<p><a href='/activation' class="btn btn-primary"><?php echo e(trans('auth.clickHereResend')); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DSIT-Saturno-5689A\Desktop\LaravelSixDotCero\resources\views/auth/activation.blade.php ENDPATH**/ ?>