<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chart.js - graphics</title>
		<!--
		<link rel="stylesheet" href="assets/demo.css">
		<script src="../node_modules/dat.gui/build/dat.gui.min.js"></script>
		<script src="../tracking.js-master/assets/stats.min.js"></script>
		-->
		<script src="Chart.bundle.js"></script>
		
		<style>
			body {  
				background: floralwhite;
				padding: 16px;
			}
				
			canvas {
				border: 1px dotted black;
			}
				
			.chart-container {
				position: relative;
				margin: 0px;
				height: 45vh;
				width: 70%;
			}
			
			.testo {
				border: 1px dotted black;
				width: 25%;
				height: 100%;
				float: right;
				padding: 5px 5px;
				text-align: center;
			}
			
			#adminButton {
				border: none;
				width: 100%;
			}
			
			/* admin login */
				input[type=text], input[type=password] {
					width: 100%;
					padding: 12px 20px;
					margin: 8px 0;
					display: inline-block;
					border: 1px solid #ccc;
					box-sizing: border-box;
				}

				button {
					background-color: #ffcb55;
					color: black;
					padding: 14px 20px;
					margin-top: 14px;
					border: none;
					cursor: pointer;
					width: 100%;
				}

				button:hover {
					opacity: 0.8;
				}

				.cancelbtn {
					width: auto;
					padding: 10px 18px;
					background-color: #f44336;
				}

				.imgcontainer {
					text-align: center;
					margin: 24px 0 12px 0;
					position: relative;
				}

				.container {
					padding: 16px;
				}

				span.psw {
					float: right;
					padding-top: 16px;
				}

				.modal {
					display: none;
					position: fixed;
					z-index: 1;
					left: 0;
					top: 0;
					width: 100%;
					height: 100%;
					overflow: auto;
					background-color: rgb(0,0,0);
					background-color: rgba(0,0,0,0.4);
					padding-top: 60px;
				}

				.modal-content {
					background-color: #fffaf0;
					margin: 5% auto 15% auto;
					border: 1px solid #888;
					width: 80%;
				}

				.close {
					position: absolute;
					right: 25px;
					top: 0;
					color: #000;
					font-size: 35px;
					font-weight: bold;
				}

				.close:hover,
				.close:focus {
					color: red;
					cursor: pointer;
				}

				.animate {
					-webkit-animation: animatezoom 0.6s;
					animation: animatezoom 0.6s
				}

				@-webkit-keyframes animatezoom {
					from {-webkit-transform: scale(0)} 
					to {-webkit-transform: scale(1)}
				}
					
				@keyframes animatezoom {
					from {transform: scale(0)} 
					to {transform: scale(1)}
				}

				@media screen and (max-width: 300px) {
					span.psw {
					   display: block;
					   float: none;
					}
					.cancelbtn {
					   width: 100%;
					}
				}
			/* admin login */
		</style>
		
	</head>
	<body> 
		<div id="testo" class="testo">
			<h1>FaceDetection</h1>
				<h3>
					Lo scopo di questo progetto è di rilevare le facce tramite una webcam.<br>
					Il numero dei volti rilevati dal programma viene salvato e immesso<br>
					all` interno di dei grafici, in modo da avere un conteggio<br>
					delle persone rilevate in base alla fascia oraria.<br>
				</h3>
			
			<div class="testo" id="adminButton">
				<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

				<div id="id01" class="modal">
				  
				  <form class="modal-content animate" action="login.php" target="_blank">
					<div class="imgcontainer">
					  <span onclick="document.getElementById('id01').style.display='none', AdminLogin()" class="close" title="Close Modal">&times;</span>
					</div>
					
					<div class="container">
					  <label><b>Username</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" required>

					  <label><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw" required>
						
					  <button id="adminLogin" type="submit">Login</button>
					  <input type="checkbox" checked="checked"> Remember me
					</div>
				  </form>
				</div>
			</div>
		</div>
		<div class="chart-container">
			<canvas id="chartNumeroVisite"></canvas>
			<br>
			<canvas id="chartTempoMedio"></canvas>
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
			
			$sql = "SELECT Orario_inizio, Orario_fine, Data FROM webcam";
			$result = $conn->query($sql);
			
			$Orario_inizio=array();
			$Orario_fine=array();
			$Data=array();
			$arrayIndex = 0;
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($Orario_inizio, $row["Orario_inizio"]);
					array_push($Orario_fine, $row["Orario_fine"]);
					array_push($Data, $row["Data"]);
				}
			} else {
				echo "0 results";
			}
			$countUsers=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			for ($i = 0; $i < count($Orario_inizio);$i++) {
				if (substr($Orario_inizio[$i],0,2)>=9 && substr($Orario_inizio[$i],0,2)<10) {
					$countUsers[0]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=10 && substr($Orario_inizio[$i],0,2)<11) {
					$countUsers[1]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=11 && substr($Orario_inizio[$i],0,2)<12) {
					$countUsers[2]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=12 && substr($Orario_inizio[$i],0,2)<13) {
					$countUsers[3]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=13 && substr($Orario_inizio[$i],0,2)<14) {
					$countUsers[4]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=14 && substr($Orario_inizio[$i],0,2)<15) {
					$countUsers[5]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=15 && substr($Orario_inizio[$i],0,2)<16) {
					$countUsers[6]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=16 && substr($Orario_inizio[$i],0,2)<17) {
					$countUsers[7]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=17 && substr($Orario_inizio[$i],0,2)<18) {
					$countUsers[8]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=18 && substr($Orario_inizio[$i],0,2)<19) {
					$countUsers[9]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=19 && substr($Orario_inizio[$i],0,2)<20) {
					$countUsers[10]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=20 && substr($Orario_inizio[$i],0,2)<21) {
					$countUsers[11]+=1;
				}else if (substr($Orario_inizio[$i],0,2)>=21 && substr($Orario_inizio[$i],0,2)<22) {
					$countUsers[12]+=1;
				}else if (substr($Orario_inizio[$i],0,2)==22) {
					$countUsers[13]+=1;
				}
			}

			/*$mediaUsers=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			for ($i = 0; $i < count($Orario_inizio);$i++) {
				if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:00:10") {
					$mediaUsers[0]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:10" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:00:20") {
					$mediaUsers[1]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>"=00:00:20" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:00:30") {
					$mediaUsers[2]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:00:40") {
					$mediaUsers[3]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:00:50") {
					$mediaUsers[4]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:00") {
					$mediaUsers[5]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:10") {
					$mediaUsers[6]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:20") {
					$mediaUsers[7]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:30") {
					$mediaUsers[8]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:40") {
					$mediaUsers[9]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:01:50") {
					$mediaUsers[10]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:02:00") {
					$mediaUsers[11]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="00:00:00" && date_diff($Orario_fine[$i],$Orario_inizio[$i])<"00:02:10") {
					$mediaUsers[12]+=1;
				}else if (date_diff($Orario_fine[$i],$Orario_inizio[$i])>="02:00:10") {
					$mediaUsers[13]+=1;
				}
			}
			*/
			$conn->close();
		?>
		<script>
		
		//Popola l'array con gli orari di inizio del tracking.
		var count = <?php echo count($Orario_inizio); ?>;

		var Orario_inizio = ["","","","","","","","","","","","","",""];
		for(i=0; i < count; i++) {
			Orario_inizio[i] = "<?php echo $Orario_inizio[$arrayIndex+=1]; ?>";
		}
		<?php $arrayIndex = 0; ?>

		//Popola l'array con gli orari di fine del tracking.
		var count = <?php echo count($Orario_fine); ?>;
		var Orario_fine =  ["","","","","","","","","","","","","",""];
		for(i=0; i < count; i++) {
			Orario_fine[i] = "<?php echo $Orario_fine[$arrayIndex+=1]; ?>";
		}
		<?php $arrayIndex = 0; ?>
		
		//Popola l'array con le date del tracking.
		var count = <?php echo count($Data); ?>;
		var Data = ["","","","","","","","","","","","","",""];
		for(i=0; i < count; i++) {
			Data[i] = "<?php echo $Data[$arrayIndex+=1]; ?>";
		}
		<?php $arrayIndex = 0; ?>	


		var dataNumeroVisite = {
			labels: ["09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00"],
			datasets: [{
				label: "Numero di visite",
				backgroundColor: "rgba(255,99,132,0.2)",
				borderColor: "rgba(255,99,132,1)",
				borderWidth: 2,
				hoverBackgroundColor: "rgba(255,99,132,0.4)",
				hoverBorderColor: "rgba(255,99,132,1)",
				data: [<?php echo $countUsers[0]; ?>, <?php echo $countUsers[1]; ?>, <?php echo $countUsers[2]; ?>, <?php echo $countUsers[3]; ?>, <?php echo $countUsers[4]; ?>, <?php echo $countUsers[5]; ?>, <?php echo $countUsers[6]; ?>, <?php echo $countUsers[7]; ?>, <?php echo $countUsers[8]; ?>, <?php echo $countUsers[9]; ?>, <?php echo $countUsers[10]; ?>, <?php echo $countUsers[11]; ?>, <?php echo $countUsers[12]; ?>,0]
			}]
		};
			
		var optionsNumeroVisite = {
			maintainAspectRatio: false,
			scales: {
				yAxes: [{
				stacked: true,
				gridLines: {
					display: true,
					color: "rgba(255,99,132,0.2)"
				}
				}],
				xAxes: [{
				gridLines: {
					display: false
				}
				}]
			}
		};
		
		var dataTempoMedio = {
			labels: ["00:00:00","00:00:10", "00:00:20", "00:00:30", "00:00:40", "00:00:50", "00:01:00", "00:01:10", "00:01:20", "00:01:30", "00:01:40", "00:01:50", "00:02:00", ">05:00:00"],
			datasets: [{
				label: "Tempo medio di visita",
				backgroundColor: "rgba(99,132,255,0.2)",
				borderColor: "rgba(99,132,255,1)",
				borderWidth: 2,
				hoverBackgroundColor: "rgba(99,132,255,0.4)",
				hoverBorderColor: "rgba(99,132,255,1)",
				data: [65, 59, 20, 81, 56, 55, 40, 35, 24, 78, 13, 35, 86, 24],
			}]
		};
			
		var optionsTempoMedio = {
			maintainAspectRatio: false,
			scales: {
				yAxes: [{
				stacked: true,
				gridLines: {
					display: true,
					color: "rgba(99,132,255,0.2)"
				}
				}],
				xAxes: [{
				gridLines: {
					display: false
				}
				}]
			}
		};
		
		Chart.Bar('chartNumeroVisite', {
			options: optionsNumeroVisite,
			data: dataNumeroVisite
		});
		Chart.Bar('chartTempoMedio', {
			options: optionsTempoMedio,
			data: dataTempoMedio
		});
		
		</script>
	</body>
</html>