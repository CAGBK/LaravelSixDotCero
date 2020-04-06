<?php foreach ($challenges as $challenge): ?>
  <div class="modal fade bd-example-modal-lg" id="challengeModal<?php echo e($challenge->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e($challenge->name); ?></h5>
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
              <?php echo e($challenge->users); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Marcas:
              </strong>
            </div>

            <div class="col-sm-7">
                
              <?php echo e($challenge->subcategories); ?>


            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Estado:
              </strong>
            </div>

            <div class="col-sm-7">
              
              <?php echo e($challenge->state_id); ?>

              
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
        <button type="button" class="btn btn-primary">Jugar</button>
        <button type="button" class="btn btn-primary">Continuar Desafio</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/modals/modal-challenge.blade.php ENDPATH**/ ?>