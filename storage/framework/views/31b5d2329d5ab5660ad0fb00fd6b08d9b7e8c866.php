<script>
    // Create new wheel object specifying the parameters at creation time.
    let miRuleta = new Winwheel({
	  'drawText' : true,
	  'numSegments': <?php echo $cquestions->count() ?>,
	  'outerRadius': 230,
	  'innerRadius': 60,
	  'rotationAngle'   : -60, 
	  'responsive'   : true,  // This wheel is responsive!
	  'textOrientation' : 'curved',
	  'textAlignment'  : 'inner',
	  'textMargin' : 90, 
	  'textFontSize' : 30,
	  'lineWidth'   : 4 	,
	  'textFontWeight' : 'bold',
      'drawMode'          : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
	  
	  'segments': [
		  <?php $__currentLoopData = $cquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			{
			'image' : '<?php echo e($question->image); ?>', 
			'id': '<?php echo e($question->id); ?>'
			},
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  ],
        'animation' :           // Specify the animation to use.
        {
            'type'     : 'spinToStop',
            'duration' : 7,     // Duration in seconds.
			'spins'    : 9,     // Number of complete spins.
			'callbackSound' : playSound, 
			'callbackFinished': 'Mensaje()',
        }
    });
    function Mensaje() {
	  segmentoSeleccionado = miRuleta.getIndicatedSegment();
	  miRuleta.stopAnimation(false);
	  window.location= "/question-game/" + segmentoSeleccionado.id + '/' + <?php echo e($challenge->id); ?>;
	}
	
    let audio = new Audio('/images/tick.mp3');  // Create audio object and load desired file.
 
    function playSound()
    {
        // Stop and rewind the sound (stops it if already playing).
        audio.pause();
        audio.currentTime = 0;
 
        // Play the sound.
        audio.play();
    }
</script><?php /**PATH C:\Users\dsgut\Desktop\SW\LaravelSixDotCero\resources\views/scripts/ruleta.blade.php ENDPATH**/ ?>