<li class="notification-box">
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-3 text-center">
        	<img src="<?php if($notification->data['status'] == 1): ?> <?php echo e($notification->data['image']); ?> <?php else: ?> <?php echo e(Gravatar::get(Auth()->user()->email)); ?>  <?php endif; ?>" alt="<?php echo e($notification->data['user_name']); ?>" class="user-avatar-nav user-challenge">
        </div>    
        <div class="col-lg-8 col-sm-8 col-8">
            <strong class="text-white"><?php echo e($notification->data['user_name']); ?></strong>
            <div class="text-white">
                Te ha invitado a un desafio llamado <a class="nama-ch" href="/game/<?php echo e($notification->data['challenge_id']); ?>"><?php echo e($notification->data['challenge_name']); ?></a>
            </div>
            <small class="text-warning"><?php echo e($notification->created_at); ?></small>
        </div>    
    </div>
</li><?php /**PATH /home3/desafiogru/LaravelSixDotCero/resources/views/partials/notification/replied_to_thread.blade.php ENDPATH**/ ?>