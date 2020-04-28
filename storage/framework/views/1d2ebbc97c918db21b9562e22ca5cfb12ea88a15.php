<?php foreach ($challenges as $challenge): ?>
  <div class="modal fade bd-example-modal-lg" id="challengeModal<?php echo e($challenge->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo e($challenge->name); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Usuarios:
              </strong>
            </div>
            <div class="col-sm-7">
              <?php 
              $arrayUsers = json_decode($challenge->users);
              ?>
              <?php $__currentLoopData = $arrayUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="badge badge-info"><?php echo e($value == $user->id ? $user->name : ''); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Marcas:
              </strong>
            </div>

            <div class="col-sm-7">
              <?php 
              $arraySubcategories = json_decode($challenge->subcategories);
              ?>
              <?php $__currentLoopData = $arraySubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="badge badge-info"><?php echo e($value == $subcategory->id ? $subcategory->name : ''); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Estado:
              </strong>
            </div>

            <div class="col-sm-7">
              
              <?php echo e($challenge->state->state); ?>

              
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Fecha desafio:
              </strong>
            </div>

            <div class="col-sm-7">
              <span><strong>Fecha Inicio: </strong></span><?php echo e($challenge->start_date); ?> <span><strong>Fecha Fin: </strong></span><?php echo e($challenge->end_date); ?> 
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <?php $__currentLoopData = $challenge->challengeus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($element->user_id == Auth()->user()->id && $element->state_id === 3): ?>
          <a href="<?php echo e(route('game',['id' => $challenge->id])); ?>" type="button" class="btn btn-primary">Continuar Desafío</a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $challenge->challengeus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($element->user_id == Auth()->user()->id && $element->state_id === 1): ?>
          <a href="<?php echo e(route('game',['id' => $challenge->id])); ?>" type="button" class="btn btn-primary">Jugar</a>
        <?php endif; ?> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($challenge->user_id === Auth()->user()->id && $element->state_id != 2): ?>
          <a href="<?php echo e(route('edit_challenge',['id' => $challenge->id])); ?>" type="button" class="btn btn-success">Editar Desafío</a>
        <?php endif; ?> 
        <a href="<?php echo e(route('game',['id' => $challenge->id])); ?>" type="button" class="btn btn-primary">Ver detalle</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/modals/modal-challenge.blade.php ENDPATH**/ ?>