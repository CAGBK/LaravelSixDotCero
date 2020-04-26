<script>
	
	var miRuleta;
	var segmentoSeleccionado;
	var distnaciaX = 150;
	var distnaciaY = 50;
	var ctx ;
	
	miRuleta = new Winwheel({
	  'canvasId': 'Ruleta',
	  'drawText' : true,
	  'numSegments': <?php echo $cquestions->count() ?>,
	  'outerRadius': 230,
	  'innerRadius': 60,
	  'rotationAngle'   : -60, 
	  'responsive'   : true,  // This wheel is responsive!
	  'textOrientation' : 'curved',
	  'textAlignment'  : 'outer',
	  'textMargin' : 50, 
	  'textFontSize' : 30,
	  'lineWidth'   : 4,
	  'textFontWeight' : 'bold',
	  'imageOverlay' : true, 
	  'strokeStyle'  : '#2cab66',
	  
	  'segments': [
		  <?php $__currentLoopData = $cquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			{
			'image' : 'images/producto.png', 
			'fillStyle': '<?php echo e($question->color); ?>', 
			'textStrokeStyle' : '#fff',
			'text': '<?php echo e($question->name); ?>', 
			'id': '<?php echo e($question->id); ?>'
			},
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
	miRuleta.segments.textFillStyle = '#FFFFFF';
	miRuleta.draw();
	function Mensaje() {
	  segmentoSeleccionado = miRuleta.getIndicatedSegment();
	  miRuleta.stopAnimation(false);
	  window.location= "/question-game/" + segmentoSeleccionado.id + '/' + <?php echo e($challenge->id); ?>;
	}
   function dibujarIndicador() {
	   distnaciaX = 150;
	   distnaciaY = 50;
	   ctx = miRuleta.ctx;
	   ctx.strokeStyle = 'navy';
	   ctx.fillStyle = '#000000';
	   ctx.lineWidth = 0;
	   ctx.beginPath();
	   ctx.moveTo(distnaciaX + 170, distnaciaY + 5);
	   ctx.lineTo(distnaciaX + 230, distnaciaY + 5);
	   ctx.lineTo(distnaciaX + 200, distnaciaY + 40);
	   ctx.lineTo(distnaciaX + 171, distnaciaY + 5);
	   ctx.stroke();
	   ctx.fill();
   }
   dibujarIndicador();
	let theWheel = new Winwheel({
		'drawMode' : 'image'                // drawMode must be set to image.
	});
   // Create new image object in memory.
	let loadedImg = new Image();
	
	// Create callback to execute once the image has finished loading.
	loadedImg.onload = function()
	{
		theWheel.wheelImage = loadedImg;    // Make wheelImage equal the loaded image object.
		theWheel.draw();                    // Also call draw function to render the wheel.
	}
	
	// Set the image source, once complete this will trigger the onLoad callback (above).
	loadedImg.src = "/images/producto.png";
</script><?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\resources\views/scripts/ruleta.blade.php ENDPATH**/ ?>