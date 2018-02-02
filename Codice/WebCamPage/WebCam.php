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
				margin-left: 120px;
				margin-top: 25px;
				position: absolute;
			}
			body {
				background-color: black;
				margin: 0px;
				zoom: 250%;
			}
			img {
				margin: 0px;
			}
			input {
				display: none;
				float: left;
			}
		</style>
	</head>
	<body>
		<div class="demo-frame">
			<div class="demo-container">
				<video id="video" width="360" height="240" preload autoplay loop muted></video>
				<canvas id="canvas" width="360" height="240"></canvas>
			</div>
			<img src="cameraOverlay.png" width="610" height="290">
			
			<form method="post" name="sendingData" action="<?=$_SERVER['PHP_SELF'];?>">
				<input type="text" name="ID" id="ID"></input>
				<input type="text" name="Orario_inizio" id="Orario_inizio"></input>
				<input type="text" name="Orario_fine" id="Orario_fine"></input>
				<input type="text" name="Data" id="Data"></input>
			</form>
		</div>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "facedetection";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Orario_inizio = $_POST["Orario_inizio"];
				$Orario_fine = $_POST["Orario_fine"];
				$Data = $_POST["Data"];
				$Id_webcam = $_POST["ID"];
				
				//$sql = "INSERT INTO webcam (Id_webcam, Orario_inizio, Orario_fine, Data) VALUES (".$Id_webcam.", ".$Orario_inizio.", ".$Orario_fine.", ".$Data.");";
				$sql = "INSERT INTO webcam (Orario_inizio, Orario_fine, Data) VALUES (".$Orario_inizio.", ".$Orario_fine.", ".$Data.");";
				if($conn->query($sql) == FALSE) {
					echo "invio non riuscito!";
				}
			}
			$conn->close();
		?>
		<script>
			var startTime = new Date();
			var endTime;
			var today;
			var maxTime = 15000;
			var oldRects = [[0,0,0,0,0]];
			var newRects = [[0,0,0,0,0]];
			
			//var items = [
			//	[1, 2],
			//	[3, 4],
			//	[5, 6]
			//];
			//console.log(items[2][0]); // 5
			
			window.onload = function() {
				
				var video = document.getElementById('video');
				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');
				var tracker = new tracking.ObjectTracker('face');
				
				var ID=0;
				
				tracker.setInitialScale(4);
				tracker.setStepSize(2);
				tracker.setEdgesDensity(0.1);
				
				tracking.track('#video', tracker, { camera: true });
				
				tracker.on('track', function(event) {
					context.clearRect(0, 0, canvas.width, canvas.height);
					event.data.forEach(function(rect) {
					
						/*var maxID = 0;
						for(i = 0; i < oldRects.length; i++) {
							maxID = Math.max(maxID, oldRects[i][4]);
						}
						
						var present = false;
						//console.log("rect.x: "+rect.x +" |rectW: "+rect.width +" |LL:" + oldRects.length);
						for(i = 1; i < oldRects.length; i++) {
						
							var maxMarginX = rect.x + rect.width/2;
							var minMarginX = rect.x - rect.width/2;
							console.log(rect.x+" | "+maxMarginX+", "+minMarginX +" | "+oldRects[i][0]+":"+oldRects.length);
							
							if(oldRects[i][0] >= minMarginX && oldRects[i][0] <= maxMarginX) {
								ID = oldRects[i][4];
								present = true;
								break;
							}
						}
						
						if(!present && oldRects.length>1){
							ID = maxID+1;
							console.log("Incremento id");
						}*/
						
						
						var present = false;
						if(oldRects.length >= 1) {
							for(i = 1; i < oldRects.length+1; i++) {
								//console.log(rect.x+" | "+(oldRects[i-1][0] + oldRects[i-1][2])+", "+(oldRects[i-1][0] - oldRects[i-1][2]));
								
								if(rect.x <= oldRects[i-1][0] + oldRects[i-1][2] && rect.x >= oldRects[i-1][0] - oldRects[i-1][2]) {
									//console.log("ci sono!");
									ID = i;
									present = true;
									break;
								}
							}
							//console.log(":");
							
							//Aggiunta della faccia all'array
							var newRect = [rect.x, rect.y, rect.width, rect.height, ID];
							newRects.push(newRect);
							
							context.strokeStyle = 'red';
							context.strokeRect(rect.x, rect.y, rect.width, rect.height);
							context.font = '13px Helvetica';
							context.fillStyle = "#fff";
							context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
							context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
							context.fillText('id: ' + ID, rect.x + rect.width + 5, rect.y + 33);
						
							if(present == false) {
								//Formatta i dati e li invia al DB
								console.log("inviato!");
								
								
								//Orario di inizio convertito in formato MySQL
								startTime.setHours(startTime.getHours()+1);
								startTime = startTime.toISOString().substring(11, 19).replace('T', ' ');
								document.getElementById("Orario_inizio").value = startTime;
								//console.log(startTime);
								
								//Orario di fine convertito in formato MySQL
								endTime = new Date();
								endTime.setHours(endTime.getHours()+1);
								endTime = endTime.toISOString().substring(11, 19).replace('T', ' ');
								document.getElementById("Orario_fine").value = endTime;
								//console.log(endTime);
								
								//Data convertita in formato MySQL
								today = (new Date()).toISOString().substring(0, 10);
								document.getElementById("Data").value = today;
								//console.log(today);
								//console.log('Person: ' + ID);
								
								document.getElementById("ID").value = ID;
								
								document.sendingData.submit();
								
								startTime = new Date();
							}
						}
					});
					
					//Aggiornamento all'array delle vecchie facce.
					oldRects = newRects;
					//console.log('array length: '+oldRects.length);
				
					//Reset degli array
					//oldRects = [[]];
					newRects = [[0,0,0,0,0]];
				});
				
				/*var gui = new dat.GUI();
				gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
				gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
				gui.add(tracker, 'stepSize', 1, 5).step(0.1);*/
			};
			
			/*function findNewPerson(newRect, oldRect, faceID) {
				
				//Quando sono passati i minimi millisecondi o quando i rettangoli non si sovrappongono
				if(!intersectRect(newRect, oldRect) || new Date() - startTime > maxTime) {
					//Formatta i dati e li invia al DB
					console.log("inviato!");
					
					
					//Orario di inizio convertito in formato MySQL
					startTime.setHours(startTime.getHours()+1);
					startTime = startTime.toISOString().substring(11, 19).replace('T', ' ');
					console.log(startTime);
					
					//Orario di fine convertito in formato MySQL
					var endTime = new Date();
					endTime.setHours(endTime.getHours()+1);
					endTime = endTime.toISOString().substring(11, 19).replace('T', ' ');
					console.log(endTime);
					
					//Data convertita in formato MySQL
					var today = (new Date()).toISOString().substring(0, 10);
					console.log(today);
					console.log('Person: ' + (faceID+1));
					
					//CODICE DB
					
					startTime = new Date();
				}
			}
			
			function intersectRect(r1, r2) {
				//Ritorna true quando un rettangolo interseca l'altro
				return !(r2.left > r1.right || 
					r2.right < r1.left || 
					r2.top > r1.bottom ||
					r2.bottom < r1.top);
			}*/
		</script>
	</body>
</html>