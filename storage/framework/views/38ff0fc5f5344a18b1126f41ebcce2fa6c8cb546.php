<script>
	var miRuleta;
	var segmentoSeleccionado;
	var distnaciaX = 150;
	var distnaciaY = 50;
	var ctx ;
	 miRuleta = new Winwheel({
	  'canvasId': 'Ruleta',
	  'numSegments': 4,
	  'outerRadius': 270,
	  'innerRadius': 80,
	  'segments': [
		{'fillStyle': '#f1c40f', 'text': 'Patologia'},
		{'fillStyle': '#2ecc71', 'text': 'Producto'},
		{'fillStyle': '#367e22', 'text': 'Competencia'},
		{'fillStyle': '#8e44ad', 'text': 'POA'},
	  ],
	  'animation':
	  {
		'type': 'spinToStop',
		'duration':4,
		'spins': 15,
		'callbackFinished': 'Mensaje()',
		'callbackAfter': 'dibujarIndicador()' 
	  }, 
	});
	function Mensaje() {
	  segmentoSeleccionado = miRuleta.getIndicatedSegment();
	  SonidoFinal();
	  alert("Elemento seleccionado: " + segmentoSeleccionado.text + "!");
	  miRuleta.stopAnimation(false);
	  miRuleta.rotationAngle = 0;
	  miRuleta.draw();
	  dibujarIndicador();
	  
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
  var audio = new Audio('alarma.mp3');  // Create audio object and load desired file.
  function SonidoFinal()
  {
	audio.pause();
	audio.currentTime = 0;
	audio.play();
  }
</script><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/scripts/ruleta.blade.php ENDPATH**/ ?>