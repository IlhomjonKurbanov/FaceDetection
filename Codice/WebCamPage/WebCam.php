<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>tracking.js - face with camera</title>
		<!--
		<link rel="stylesheet" href="assets/demo.css">
		<script src="../node_modules/dat.gui/build/dat.gui.min.js"></script>
		<script src="../tracking.js-master/assets/stats.min.js"></script>
		-->
		
		<script src="../tracking.js-master/build/tracking-min.js"></script>
		<script src="../tracking.js-master/build/data/face-min.js"></script>
		
		<style>
			video, canvas{
				position: absolute;
				//border: 1px solid green;
				z-index: -1;
			}
			body {
				background-color: black;
				margin: 0px;
			}
			p {
				color: white;
			}
			img {
				//border: solid 1px white;
			}
		</style>
	</head>
	<body id="body">
		<div class="demo-frame">
			<div class="demo-container">
				<!--<video id="video" width="360" height="240" preload autoplay loop muted></video>-->
				<video id="video" preload autoplay loop muted></video>
				<canvas id="canvas"></canvas>
			</div>
			<img id="overlay" src="cameraOverlay.png" width="610" height="290">
		</div>
		
		<script>
			reSize();
			function reSize() {
				var w = window.innerWidth;
				var h = window.innerHeight;
				console.log("w: "+w+", h: "+h);
				
				var zoom = 250;
				var newZoom = zoom + 20;
				document.getElementById("body").style.zoom = zoom+"%";
				
				//Grandezze e margini per il <video> ed il <canvas>
				var objWidth = Math.abs((w-(w/zoom*100))/2);
				var objMarginLeft = Math.abs(((w/zoom*100)-objWidth)/2);
				var objHeight = Math.abs((h-(h/zoom*100))/2);
				var objMarginTop = Math.abs(((h/zoom*100)-objHeight)/2);
				
				//Grandezze e margini per l'<img>
				var imgWidth = Math.abs((w/zoom*100)-30);
				var imgHeight = Math.abs(imgWidth*9/16);
				var imgMarginLeft = Math.abs(((w/zoom*100)-imgWidth)/2);
				var imgMarginTop = Math.abs(((h/zoom*100)-imgHeight)/2);
				console.log(imgWidth+", "+imgHeight);
				console.log(imgMarginLeft+", "+imgMarginTop);
				
				document.getElementById("video").setAttribute("width",objWidth+"px");
				document.getElementById("video").setAttribute("height",objHeight+"px");
				document.getElementById("canvas").setAttribute("width",objWidth+"px");
				document.getElementById("canvas").setAttribute("height",objHeight+"px");
				
				document.getElementById("video").style.marginLeft = objMarginLeft+"px";
				document.getElementById("video").style.marginTop = objMarginTop+"px";
				document.getElementById("canvas").style.marginLeft = objMarginLeft+"px";
				document.getElementById("canvas").style.marginTop = objMarginTop+"px";
				
				document.getElementById("overlay").setAttribute("width",imgWidth+"px");
				document.getElementById("overlay").setAttribute("height",imgHeight+"px");
				
				document.getElementById("overlay").style.marginLeft = imgMarginLeft+"px";
				document.getElementById("overlay").style.marginTop = imgMarginTop+"px";
			}
			
			var count = 0;
			setInterval( function() {
				if(count %2 == 0) document.getElementById("overlay").setAttribute("src","cameraOverlay_REC.png");
				else document.getElementById("overlay").setAttribute("src","cameraOverlay.png");
				
				count++;
			},1000);
		</script>
		
		<?php
		$valore=array();
		$arrayIndex = 0;
		
		function loadData() {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "facedetection";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			global $valore;
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT Valore FROM configurazione WHERE Testo != 'Giorni_arretrati';";
			if($conn->query($sql) == FALSE) {
				echo "lettura non riuscita!";
			}
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($valore, $row["Valore"]);
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		}
		?>
		
		<script>
			var startTime = new Date();
			var endTime;
			var today;
			var cicle=(new Date()).getTime();
			var oldRects = [[]];
			var newRects = [[]];
			<?php loadData(); ?>
			
			window.onload = function() {
				
				var video = document.getElementById('video');
				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');
				var tracker = new tracking.ObjectTracker('face');
				
				//Popola l'array con i valori di configurazione.
				var count = <?php echo count($valore)?>;
				var valore = <?php echo '["' . implode('", "', $valore) . '"]' ?>;
				
				tracker.setInitialScale(valore[3]);
				tracker.setStepSize(valore[2]);
				tracker.setEdgesDensity(valore[1]);
				
				tracking.track('#video', tracker, { camera: true });
				
				tracker.on('track', function(event) {
					context.clearRect(0, 0, canvas.width, canvas.height);
					event.data.forEach(function(rect) {
						
						//Aggiunta della faccia all'array
						//X, Y, Width, Height, presente nel ciclo precedente, no. di millis al tracking
						var newRect = [rect.x, rect.y, rect.width, rect.height, false, (new Date()).getTime()];
						for(i = 0; i < oldRects.length; i++) {
							var oldRectX = oldRects[i][0];
							var oldRectW = oldRects[i][2];
							var newRectX = rect.x;
							var newRectW = rect.width;
							
							var maxWmargin = oldRectX + oldRectW * 0.5;
							var minWmargin = oldRectX - oldRectW * 0.5;
							
							if(newRectX >= minWmargin && newRectX <= maxWmargin) {
								//console.log("ci sono!");
								newRect[4]=true;
								break;
							}
							
						}
						newRects.push(newRect);
						
						context.strokeStyle = 'red';
						context.strokeRect(rect.x, rect.y, rect.width, rect.height);
						context.font = '13px Helvetica';
						context.fillStyle = "#fff";
						context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
						context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
						
						//Formatta i dati e li invia a PHP
						for(i=0;i < oldRects.length; i++) {
							if(oldRects[i][4] == false /*&& (new Date().getTime) - oldRects[i][5] >= valore[0]*1000*/) {
							console.log("inviato!");
							
							//Orario di inizio convertito in formato MySQL
							startTime.setHours(startTime.getHours()+1);
							startTime = startTime.toISOString().substring(11, 19).replace('T', ' ');
							
							//Orario di fine convertito in formato MySQL
							endTime = new Date();
							endTime.setHours(endTime.getHours()+1);
							endTime = endTime.toISOString().substring(11, 19).replace('T', ' ');
							
							//Data convertita in formato MySQL
							today = (new Date()).toISOString().substring(0, 10);
							
							//Invio dei dati a PHP
							xmlhttp = new XMLHttpRequest();
							xmlhttp.open("GET","DataBaseConnection.php?startTime="+startTime+"&endTime="+endTime+"&today="+today);
							xmlhttp.send();
							console.log("inviato");
							
							startTime = new Date();
							}
						}
						
						for(i = 0; i < oldRects.length; i++) {
							oldRects[i][4] = false;
						}
					});
					
					//Aggiornamento all'array delle vecchie facce.
					oldRects = newRects;
				
					//Reset degli array
					newRects = [[]];
				});
				
				/*var gui = new dat.GUI();
				gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
				gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
				gui.add(tracker, 'stepSize', 1, 5).step(0.1);*/
			};
		</script>
	</body>
</html>