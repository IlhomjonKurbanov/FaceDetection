<html>
   
	<head>
		<title>Login Page</title>
      
		<style>
			body {  
				background: floralwhite;
				padding: 16px;
			}
				

			.slidecontainer {
    			width: 50%;
    			margin-left: 25%;
			}

			.slider {
			    -webkit-appearance: none;
			    width: 100%;
			    height: 25px;
			    background: #d3d3d3;
			    outline: none;
			    -webkit-transition: .2s;
			}

			.slider:hover {
			    opacity: 1;
			}

			.slider::-webkit-slider-thumb {
			    -webkit-appearance: none;
			    appearance: none;
			    width: 25px;
			    height: 25px;
			    background: #4CAF50;
			    cursor: pointer;
			}

			.slider::-moz-range-thumb {
			    width: 25px;
			    height: 25px;
			    background: #4CAF50;
			    cursor: pointer;
			}

			.tbox{
				width:50px;

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
		</style>
      
	</head>
	
	<body onload="valoriStandard()">
	<!-- form contente tutte le impostazioni modificabili dall'admin -->
	<form method="post" name="sendingData" action="">
   		<div class="slidecontainer" align="center">
		
			<?php 
			// leggo i valori contenuti nel database e li assegno agli slider
			require_once("connection.php");
			connection();
			
			$sql = "SELECT Valore, Testo FROM configurazione";
			if($conn->query($sql) == FALSE){
				echo "connessione fallita!";
			}
			$result = $conn->query($sql);
			
			$Testo=array();
			$Valore=array();
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($Valore, $row["Valore"]);
					array_push($Testo, $row["Testo"]);
				}
			} else {
				echo "0 results";
			}
			//echo '["' . implode('", "', $Valore) . '"]';
			$i= 0;
			$result=mysqli_query($conn,"SELECT count(*) as total from configurazione");
			$data=mysqli_fetch_assoc($result);
			while($i < $data['total']){
				echo "<p>$Testo[$i]</p>
				<input type='range' min='1' max='50' value='' class='slider' id='$i' name='$i' onchange='nuovoValore()'>
				Valore: <input type='textbox' class='tbox' id='value.$i'>";
				$i++;
			}
			?>

			<!-- invio dei valori al database -->
			<div class="testo" id="adminButton">
				<button onclick="invioValori()" style="width:auto;">Modifica</button>
			</div>
		</div>
	</form>
		<?php
			$conn;
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Densita_bordoValue = $_POST["0"];
				$Scala_inizialeValue = $_POST["5"];	
				$Dimensione_stepValue = $_POST["1"];
				$Giorni_arretrati = $_POST["2"];
				$refresh = $_POST["4"];
				$LastTrack = $_POST["3"];
				$Dimensione_stepValue /= 10;
				$Scala_inizialeValue /= 5;
				$Densita_bordoValue /= 100;
				$LastTrack *= 200;
				
				// aggiorno i campi nel database
				$sql = "UPDATE configurazione 
						SET Valore = 
						case
						when Testo = 'Densita_bordo' then $Densita_bordoValue
						when Testo = 'Scala_iniziale' then $Scala_inizialeValue
						when Testo = 'Dimensione_step' then $Dimensione_stepValue
						when Testo = 'Giorni_arretrati' then $Giorni_arretrati
						when Testo = 'refresh' then $refresh
						when Testo = 'MaxTimeLastTrack' then $LastTrack
						end
						WHERE Testo in ('Densita_bordo','Scala_iniziale','Dimensione_step','Giorni_arretrati','refresh','MaxTimeLastTrack')";
				if($conn->query($sql) == FALSE) {
					echo "invio non riuscito!";
				}
				
				// aggiornamento dei valori sulla pagina
				$sql = "SELECT Valore FROM configurazione";
				if($conn->query($sql) == FALSE){
					echo "connessione fallita!";
				}
				$result = $conn->query($sql);
				
				$Valore=array();	
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						array_push($Valore, $row["Valore"]);
					}
				} else {
					echo "0 results";
				}
			}
			
			$conn->close();	
		?>
		
		<script type="text/javascript">
			var valore = <?php echo '["' . implode('", "', $Valore) . '"]' ?>;
			
			// stampo i valori letti dal database al caricamento della pagina
			function valoriStandard(){
				document.getElementById("value.0").disabled = true;
				document.getElementById("value.1").disabled = true;
				document.getElementById("value.2").disabled = true;
				document.getElementById("value.3").disabled = true;
				document.getElementById("value.4").disabled = true;
				document.getElementById("value.5").disabled = true;

				document.getElementById("value.0").value = valore[0];
				document.getElementById("value.1").value = valore[1];
				document.getElementById("value.2").value = valore[2];
				document.getElementById("value.3").value = valore[3];
				document.getElementById("value.4").value = valore[4];
				document.getElementById("value.5").value = valore[5];
				
				document.getElementById("0").value = valore[0]*100;
				document.getElementById("1").value = valore[1]*10;
				document.getElementById("2").value = valore[2];
				document.getElementById("3").value = valore[3]/200;
				document.getElementById("4").value = valore[4];
				document.getElementById("5").value = valore[5]*5;
			}

			// ad ogni cambiamento cambia anche il valore nel textbox
			function nuovoValore(){
				document.getElementById("value.0").value = document.getElementById("0").value/100;
				document.getElementById("value.1").value = document.getElementById("1").value/10;
				document.getElementById("value.2").value = document.getElementById("2").value;
				document.getElementById("value.3").value = document.getElementById("3").value*200;
				document.getElementById("value.4").value = document.getElementById("4").value;
				document.getElementById("value.5").value = document.getElementById("5").value/5;
			}
			
			// invio i valori al database
			function invioValori(){
				document.sendingData.submit();
			}
		</script>

   </body>
</html>