<script>
	
	var miRuleta;
	var segmentoSeleccionado;
	var distnaciaX = 150;
	var distnaciaY = 50;
	var ctx ;
	 miRuleta = new Winwheel({
	  'canvasId': 'Ruleta',
	  'numSegments': <?php echo $cquestions->count() ?>,
	  'outerRadius': 270,
	  'innerRadius': 80,
	  'rotationAngle'   : -60, 
	  'responsive'   : true,  // This wheel is responsive!
	  'segments': [
		  <?php $__currentLoopData = $cquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			{'fillStyle': '<?php echo e($question->color); ?>', 'text': '<?php echo e($question->name); ?>', 'id': '<?php echo e($question->id); ?>'},
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  ],
	  'animation':
	  {
		'type': 'spinToStop',
		'duration':5,
		'spins': 8,
		'callbackFinished': 'Mensaje()',
		'callbackAfter': 'dibujarIndicador()' 
	  }, 
	});
	function Mensaje() {
	  segmentoSeleccionado = miRuleta.getIndicatedSegment();
	  miRuleta.stopAnimation(false);
	  window.location= "question-game/" + segmentoSeleccionado.id;
	}

   function dibujarIndicador() {
	   distnaciaX = 150;
	   distnaciaY = 50;
	   ctx = miRuleta.ctx;
	   ctx.strokeStyle = 'navy';
	   ctx.fillStyle = '#000000';
	   ctx.lineWidth = 2;
	   ctx.beginPath();
	   ctx.moveTo(distnaciaX + 170, distnaciaY + 5);
	   ctx.lineTo(distnaciaX + 230, distnaciaY + 5);
	   ctx.lineTo(distnaciaX + 200, distnaciaY + 40);
	   ctx.lineTo(distnaciaX + 171, distnaciaY + 5);
	   ctx.stroke();
	   ctx.fill();
   }
   dibujarIndicador();
</script><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/scripts/ruleta.blade.php ENDPATH**/ ?>