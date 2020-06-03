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
		  @foreach($cquestions as $question)
			{
			'image' : '{{$question->image}}', 
			'id': '{{ $question->id }}'
			},
		  @endforeach
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
	  window.location= "/question-game/" + segmentoSeleccionado.id + '/' + {{ $challenge->id }};
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
</script>