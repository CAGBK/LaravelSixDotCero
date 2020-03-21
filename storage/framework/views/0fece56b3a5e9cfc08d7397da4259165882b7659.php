<form action="<?php echo e(route('laravelroles::permissions.store')); ?>" method="POST" accept-charset="utf-8" id="store_permission_form" class="mb-0 needs-validation" enctype="multipart/form-data" role="form" >
    <?php echo e(method_field('POST')); ?>

    <div class="card-body">
        <?php echo $__env->make('laravelroles::laravelroles.forms.permission-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="card-footer">
        <div class="row ">
            <div class="col-md-6">
                <span data-toggle="tooltip" title="<?php echo trans('laravelroles::laravelroles.tooltips.save-permission'); ?>">
                    <button type="submit" class="btn btn-success btn-lg btn-block" value="save" name="action">
                        <i class="fa fa-save fa-fw">
                            <span class="sr-only">
                                 <?php echo trans("laravelroles::laravelroles.forms.permissions-form.buttons.save-permission.sr-icon"); ?>

                            </span>
                        </i>
                        <?php echo trans("laravelroles::laravelroles.forms.permissions-form.buttons.save-permission.name"); ?>

                    </button>
                </span>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\Users\dsgut\OneDrive\Escritorio\LaravelSixDotCero\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/forms/create-permission-form.blade.php ENDPATH**/ ?>