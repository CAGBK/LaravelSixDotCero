

<?php $__env->startSection('template_title'); ?>
	<?php echo e($user->name); ?>'s Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
				<div class="card">
					<div class="card-header header-card text-white">

						<?php echo e(trans('profile.showProfileTitle',['username' => $user->name])); ?>


					</div>
					<div class="card-body">

    					<img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="user-avatar">

						<dl class="user-info">

							<dt>
								<?php echo e(trans('profile.showProfileUsername')); ?>

							</dt>
							<dd>
								<?php echo e($user->name); ?>

							</dd>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>

							<dt>
								<?php echo e(trans('profile.showProfileFirstName')); ?>

							</dt>
							<dd>
								<?php echo e($user->first_name); ?>

							</dd>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
							<?php if($user->last_name): ?>
								<dt>
									<?php echo e(trans('profile.showProfileLastName')); ?>

								</dt>
								<dd>
									<?php echo e($user->last_name); ?>

								</dd>
							<?php endif; ?>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
							<dt>
								<?php echo e(trans('profile.showProfileEmail')); ?>

							</dt>
							<dd>
								<?php echo e($user->email); ?>

							</dd>
							<div class="clearfix"></div>
            				<div class="border-bottom"></div>
							<?php if(!$categories->isEmpty()): ?>
								<dt>
									<?php echo e(trans('profile.profileCategory')); ?>

								</dt>
								<dd>
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<span class="badge badge-info"><?php echo e($category->name); ?></span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</dd>
								<div class="clearfix"></div>
            					<div class="border-bottom"></div>
							<?php endif; ?>
								

							<?php if($user->profile): ?>

								<?php if($user->profile->theme_id): ?>
									<dt>
										<?php echo e(trans('profile.showProfileTheme')); ?>

									</dt>
									<dd>
										<?php echo e($currentTheme->name); ?>

									</dd>
									<div class="clearfix"></div>
            						<div class="border-bottom"></div>
								<?php endif; ?>


								<?php if($user->profile->location): ?>
									<dt>
										<?php echo e(trans('profile.showProfileLocation')); ?>

									</dt>
									<dd>
										<?php echo e($user->profile->location); ?> <br />

										<?php if(config('settings.googleMapsAPIStatus')): ?>
											Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />

											<div id="map-canvas"></div>
										<?php endif; ?>
									</dd>
								<?php endif; ?>

								<?php if($user->profile->bio): ?>
									<dt>
										<?php echo e(trans('profile.showProfileBio')); ?>

									</dt>
									<dd>
										<?php echo e($user->profile->bio); ?>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->twitter_username): ?>
									<dt>
										<?php echo e(trans('profile.showProfileTwitterUsername')); ?>

									</dt>
									<dd>
										<?php echo HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')); ?>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->github_username): ?>
									<dt>
										<?php echo e(trans('profile.showProfileGitHubUsername')); ?>

									</dt>
									<dd>
										<?php echo HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')); ?>

									</dd>
								<?php endif; ?>
							<?php endif; ?>

						</dl>

						<?php if($user->profile): ?>
							<?php if(Auth::user()->id == $user->id): ?>

								<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>


							<?php endif; ?>
						<?php else: ?>

							<p><?php echo e(trans('profile.noProfileYet')); ?></p>
							<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>


						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php if(config('settings.googleMapsAPIStatus')): ?>
		<?php echo $__env->make('scripts.google-maps-geocode-and-map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nnvr64fpyv0g/LaravelSixDotCero/resources/views/profiles/show.blade.php ENDPATH**/ ?>