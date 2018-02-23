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
	<form method="post" name="sendingData" action="<?=$_SERVER['PHP_SELF'];?>">
   		<div class="slidecontainer" align="center">

	    	<p>Densità Bordo:</p>
	  		<input type="range" min="1" max="50" value="" class="slider" id="Densita_bordo" name="Densita_bordo" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="Densita_bordoValue">
	
	    	<p>Scala iniziale:</p>
	  		<input type="range" min="10" max="100" value="" class="slider" id="Scala_iniziale" name="Scala_iniziale" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="Scala_inizialeValue">

	    	<p>Dimensione step:</p>
	  		<input type="range" min="10" max="50" value="" class="slider" id="Dimensione_step" name="Dimensione_step" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="Dimensione_stepValue">
			
			<p>Giorni arretrati:</p>
			<input type="range" min="1" max="30" value="" class="slider" id="Giorni_arretrati" name="Giorni_arretrati" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="Giorni_arretratiValue">
			
			<p>Refresh:</p>
			<input type="range" min="1" max="30" value="" class="slider" id="refresh" name="refresh" onchange="nuovoValore()">
	  		Valore: <input type="textbox" class="tbox" id="refreshValue">
			<br><br><br>
			<!-- invio dei valori al database -->
			<div class="testo" id="adminButton">
				<button onclick="invioValori()" style="width:auto;">Modifica</button>
			</div>
		</div>
	</form>
		<?php
			// leggo i valori contenuti nel database e li assegno agli slider
			require_once("connection.php");
			connection();
			
			$sql = "SELECT Valore FROM configurazione";
			if($conn->query($sql) == FALSE){
				echo "connessione fallita!";
			}
			$result = $conn->query($sql);
			
			$Valore=array();	
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($Valore, $row["Valore"]);
				}
			} else {
				echo "0 results";
			}
			//echo '["' . implode('", "', $Valore) . '"]';
		?>

		<?php
			$conn;
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Densita_bordoValue = $_POST["Densita_bordo"];
				$Densita_bordoValue /= 100;
				
				// aggiorno il campo nel database
				$sql = "UPDATE configurazione 
						SET Valore = $Densita_bordoValue 
						WHERE Testo = 'Densita_bordo'";
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
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Scala_inizialeValue = $_POST["Scala_iniziale"];
				$Scala_inizialeValue /= 10;
				
				// aggiorno il campo nel database
				$sql = "UPDATE configurazione 
						SET Valore = $Scala_inizialeValue 
						WHERE Testo = 'Scala_iniziale'";
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
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Dimensione_stepValue = $_POST["Dimensione_step"];
				$Dimensione_stepValue /= 10;
				
				// aggiorno il campo nel database
				$sql = "UPDATE configurazione 
						SET Valore = $Dimensione_stepValue 
						WHERE Testo = 'Dimensione_step'";
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
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Giorni_arretrati = $_POST["Giorni_arretrati"];
				
				// aggiorno il campo nel database
				$sql = "UPDATE configurazione 
						SET Valore = $Giorni_arretrati 
						WHERE Testo = 'Giorni_arretrati'";
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
			
			// richiesta di collegamento al database
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$refresh = $_POST["refresh"];
				
				// aggiorno il campo nel database
				$sql = "UPDATE configurazione 
						SET Valore = $refresh 
						WHERE Testo = 'Conteggio_secondi'";
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
				document.getElementById("Densita_bordoValue").disabled = true;
				document.getElementById("Scala_inizialeValue").disabled = true;
				document.getElementById("Dimensione_stepValue").disabled = true;
				document.getElementById("Giorni_arretratiValue").disabled = true;
				document.getElementById("refreshValue").disabled = true;

				document.getElementById("Densita_bordoValue").value = valore[1];
				document.getElementById("Scala_inizialeValue").value = valore[4];
				document.getElementById("Dimensione_stepValue").value = valore[2];
				document.getElementById("Giorni_arretratiValue").value = valore[3];
				document.getElementById("refreshValue").value = valore[0];
				
				document.getElementById("Densita_bordo").value = valore[1]*100;
				document.getElementById("Scala_iniziale").value = valore[4]*10;
				document.getElementById("Dimensione_step").value = valore[2]*10;
				document.getElementById("Giorni_arretrati").value = valore[3];	
				document.getElementById("refresh").value = valore[0];	
			}

			// ad ogni cambiamento cambia anche il valore nel textbox
			function nuovoValore(){
				document.getElementById("Densita_bordoValue").value = document.getElementById("Densita_bordo").value/100;
				document.getElementById("Scala_inizialeValue").value = document.getElementById("Scala_iniziale").value/10;
				document.getElementById("Dimensione_stepValue").value = document.getElementById("Dimensione_step").value/10;
				document.getElementById("Giorni_arretratiValue").value = document.getElementById("Giorni_arretrati").value;
				document.getElementById("refreshValue").value = document.getElementById("refresh").value;
			}
			
			// invio i valori al database
			function invioValori(){
				document.sendingData.submit();
			}
		</script>

   </body>
</html>