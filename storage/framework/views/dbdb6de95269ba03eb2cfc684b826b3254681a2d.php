<!DOCTYPE html>

<html>
<head>
    <title>La ruleta de la muerte</title>
    <script src="js/Winwheel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/TweenMax.min.js"></script>

    
</head>
<body>
    <form id="form1" runat="server">

    <div class="container">
        <style> 
          #canvasContainer {
            background-image: url(img/Muerte.png);
            background-repeat: no-repeat;
            background-position: center;
            width: 700px;
            height: 700px;
            cursor: pointer;
          }

        </style>

        <div class="container-fluid">
          <div class="row">
            <div class="col-3 text-center"> 
              <div class="card bg-warning">
                <div class="card-body">
                  <h4 class="card-title">Lista de elementos:</h4>  
                  <textarea id="ListaElementos" class="form-control" rows="13">
                    Equipo 1
                    Equipo 2
                    Equipo 3
                    Equipo 4
                    Equipo 5
                    Equipo 6
                    Equipo 7
                    Equipo 10
                  </textarea>
                  <br />
                </div>
              </div>
            </div>
            <div class="col-7 text-center">
              <br/>
              <div id="canvasContainer" onclick="miRuleta.startAnimation()">
                <canvas id='Ruleta' width='700' height='690'>
                  Canvas not supported, use another browser.
                </canvas> 
              </div>
            </div>
            <div class="col-2">
              <br/>
            </div>
          </div>
        </div>
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
      </script>
    </div>
  </form>
</body>
</html><?php /**PATH C:\Users\d.gutierrezg\Desktop\LaravelSixDotCero\resources\views/challenge/ruleta.blade.php ENDPATH**/ ?>