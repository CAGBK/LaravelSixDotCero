 <?php $__env->startSection('template_title'); ?> Desafíos <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<div class="form-card">
    <div class="col-12 nav-report-challenge">
        <h2 class="text ch-text fs-title-list">Reporte de Desafio</h2>
        <h3 class="text ch-text-two text-white"><?php echo e($challenge->name); ?></h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table id="challenge-report" class="table-responsive">
                <thead>
                    <tr>
                        <th class="sorting_asc"></th>
                        <th class="sorting_asc"></th>
                        <th class="sorting_asc"></th>
                        <th></th>
                        <th class="sorting_asc"></th>
                    </tr>
                </thead>
                <?php if($users): ?>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-challenge-report">
                        <td class="sorting">
                            <label name="img-user" class="label-challenge-iteration" for=""><?php echo e($loop->iteration); ?> </label>
                        </td>
                        <td>
                            <img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="user-avatar-nav user-challenge-report" />
                        </td>
                        <td class="">
                            <label name="img-user" class="label-challenge-name" for=""><?php echo e($user->name); ?> </label>
                        </td>
                        <td>
                            <?php if($loop->first): ?>
                            <i class="fa fa-trophy insigts-gold" aria-hidden="true"></i>
                            <?php endif; ?> <?php if($loop->iteration == 2): ?>
                            <i class="fa fa-trophy insigts-silver" aria-hidden="true"></i>
                            <?php endif; ?> <?php if($loop->iteration == 3): ?>
                            <i class="fa fa-trophy insigts-bronze" aria-hidden="true"></i>
                            <?php endif; ?>
                        </td>
                        <td class="tr-challenge-points">
                            <label name="img-user" class="label-challenge-points" for=""><?php echo e($user->score); ?> Puntos</label>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>
        <div class="col-md-6">
            <table id="brands-check" class="table">
                       
                            <?php if($subcategories): ?>

                            <tbody>
                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="tr-challenge-two" style="background-color:<?php echo e($subcategory->color_brand); ?>;">
                                    <td class="sorting">
                                        <label class="checkbox-two path cs-check">
                                            <svg viewBox="0 0 21 21">
                                                <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                                            </svg>
                                        </label>
                                        <img name="img-subcategory" src="<?php echo e($subcategory->subcategory_image); ?>" alt="<?php echo e($subcategory->subcategory_image); ?>" class=" subcategory-challenge">
                                        <label class="sub-name"><?php echo e($subcategory->name); ?></label>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <?php endif; ?>
                        </table>
        </div> 
    </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('footer_scripts'); ?> <?php echo $__env->make('scripts.reports', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dsgut\Desktop\SW\LaravelSixDotCero\resources\views/challenge/reports/challenge.blade.php ENDPATH**/ ?>