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
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$Orario_inizio = $_GET["startTime"];
		$Orario_fine = $_GET["endTime"];
		$Data = $_GET["today"];
		//$Id_visita = $_GET["ID"];
		
		$sql = "INSERT INTO visita (Orario_inizio, Orario_fine, Data) VALUES ('$Orario_inizio', '$Orario_fine', '$Data');";
		if($conn->query($sql) == FALSE) {
			echo "invio non riuscito!";
		}
	}
	$conn->close();
?>